/**
 * Theme System - Light Mode and Dark Mode Management
 * Handles theme switching, localStorage persistence, and system preference detection
 */

class ThemeManager {
  constructor() {
    this.theme = 'light';
    this.themeToggle = null;
    this.themeToggleSlider = null;
    this.themeToggleLabel = null;
    
    this.init();
  }

  init() {
    // Initialize theme from localStorage or system preference
    this.loadTheme();
    
    // Create theme toggle elements
    this.createThemeToggle();
    
    // Apply current theme
    this.applyTheme();
    
    // Listen for system theme changes
    this.listenForSystemThemeChanges();
    
    // Add theme toggle to navigation
    this.addThemeToggleToNavigation();
  }

  /**
   * Load theme from localStorage or detect system preference
   */
  loadTheme() {
    // Check localStorage first
    const savedTheme = localStorage.getItem('theme');
    
    if (savedTheme && (savedTheme === 'light' || savedTheme === 'dark')) {
      this.theme = savedTheme;
    } else {
      // Detect system preference
      this.theme = this.detectSystemTheme();
    }
  }

  /**
   * Detect system theme preference
   */
  detectSystemTheme() {
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      return 'dark';
    }
    return 'light';
  }

  /**
   * Create theme toggle button
   */
  createThemeToggle() {
    // Create toggle container
    const toggleContainer = document.createElement('div');
    toggleContainer.className = 'theme-toggle-container';
    
    // Create label
    this.themeToggleLabel = document.createElement('span');
    this.themeToggleLabel.className = 'theme-toggle-label';
    this.themeToggleLabel.textContent = 'Theme';
    
    // Create toggle button
    this.themeToggle = document.createElement('div');
    this.themeToggle.className = 'theme-toggle';
    this.themeToggle.setAttribute('role', 'button');
    this.themeToggle.setAttribute('tabindex', '0');
    this.themeToggle.setAttribute('aria-label', 'Toggle theme');
    
    // Create toggle slider
    this.themeToggleSlider = document.createElement('div');
    this.themeToggleSlider.className = 'toggle-slider';
    
    // Assemble toggle
    this.themeToggle.appendChild(this.themeToggleSlider);
    toggleContainer.appendChild(this.themeToggleLabel);
    toggleContainer.appendChild(this.themeToggle);
    
    // Store reference
    this.toggleContainer = toggleContainer;
    
    // Add event listeners
    this.addToggleEventListeners();
  }

  /**
   * Add event listeners to theme toggle
   */
  addToggleEventListeners() {
    // Click event
    this.themeToggle.addEventListener('click', () => {
      this.toggleTheme();
    });
    
    // Keyboard events
    this.themeToggle.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        this.toggleTheme();
      }
    });
    
    // Touch events for mobile
    this.themeToggle.addEventListener('touchstart', (e) => {
      e.preventDefault();
      this.toggleTheme();
    });
  }

  /**
   * Add theme toggle to navigation
   */
  addThemeToggleToNavigation() {
    const navbarNav = document.querySelector('.navbar-nav');
    
    if (navbarNav) {
      // Create nav item for theme toggle
      const navItem = document.createElement('li');
      navItem.className = 'nav-item d-flex align-items-center';
      navItem.appendChild(this.toggleContainer);
      
      // Add to navbar
      navbarNav.appendChild(navItem);
    } else {
      // Fallback: add to navbar container
      const navbarContainer = document.querySelector('.navbar .container');
      if (navbarContainer) {
        const navbarCollapse = navbarContainer.querySelector('.navbar-collapse');
        if (navbarCollapse) {
          navbarCollapse.appendChild(this.toggleContainer);
        }
      }
    }
  }

  /**
   * Toggle between light and dark themes
   */
  toggleTheme() {
    this.theme = this.theme === 'light' ? 'dark' : 'light';
    this.applyTheme();
    this.saveTheme();
    this.updateToggleState();
    
    // Dispatch custom event
    this.dispatchThemeChangeEvent();
  }

  /**
   * Apply current theme to document
   */
  applyTheme() {
    const html = document.documentElement;
    
    // Remove existing theme classes
    html.classList.remove('theme-light', 'theme-dark');
    
    // Add current theme class
    html.classList.add(`theme-${this.theme}`);
    
    // Set data attribute for CSS targeting
    html.setAttribute('data-theme', this.theme);
    
    // Update meta theme-color for mobile browsers
    this.updateMetaThemeColor();
    
    // Update toggle state
    this.updateToggleState();
  }

  /**
   * Update toggle button state
   */
  updateToggleState() {
    if (this.themeToggleSlider) {
      if (this.theme === 'dark') {
        this.themeToggleSlider.style.transform = 'translateX(24px)';
        this.themeToggle.setAttribute('aria-label', 'Switch to light mode');
      } else {
        this.themeToggleSlider.style.transform = 'translateX(0)';
        this.themeToggle.setAttribute('aria-label', 'Switch to dark mode');
      }
    }
    
    // Update label text
    if (this.themeToggleLabel) {
      this.themeToggleLabel.textContent = this.theme === 'light' ? 'Light' : 'Dark';
    }
  }

  /**
   * Save theme preference to localStorage
   */
  saveTheme() {
    try {
      localStorage.setItem('theme', this.theme);
    } catch (e) {
      console.warn('Could not save theme preference to localStorage:', e);
    }
  }

  /**
   * Update meta theme-color for mobile browsers
   */
  updateMetaThemeColor() {
    let metaThemeColor = document.querySelector('meta[name="theme-color"]');
    
    if (!metaThemeColor) {
      metaThemeColor = document.createElement('meta');
      metaThemeColor.name = 'theme-color';
      document.head.appendChild(metaThemeColor);
    }
    
    if (this.theme === 'dark') {
      metaThemeColor.content = '#1a1a1a';
    } else {
      metaThemeColor.content = '#ffffff';
    }
  }

  /**
   * Listen for system theme changes
   */
  listenForSystemThemeChanges() {
    if (window.matchMedia) {
      const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
      
      mediaQuery.addEventListener('change', (e) => {
        // Only auto-switch if user hasn't manually set a preference
        if (!localStorage.getItem('theme')) {
          this.theme = e.matches ? 'dark' : 'light';
          this.applyTheme();
          this.updateToggleState();
          this.dispatchThemeChangeEvent();
        }
      });
    }
  }

  /**
   * Dispatch custom event for theme changes
   */
  dispatchThemeChangeEvent() {
    const event = new CustomEvent('themechange', {
      detail: {
        theme: this.theme,
        previousTheme: this.theme === 'light' ? 'dark' : 'light'
      }
    });
    
    document.dispatchEvent(event);
  }

  /**
   * Get current theme
   */
  getCurrentTheme() {
    return this.theme;
  }

  /**
   * Set specific theme
   */
  setTheme(theme) {
    if (theme === 'light' || theme === 'dark') {
      this.theme = theme;
      this.applyTheme();
      this.saveTheme();
      this.updateToggleState();
      this.dispatchThemeChangeEvent();
    }
  }

  /**
   * Reset to system preference
   */
  resetToSystemPreference() {
    localStorage.removeItem('theme');
    this.theme = this.detectSystemTheme();
    this.applyTheme();
    this.updateToggleState();
    this.dispatchThemeChangeEvent();
  }

  /**
   * Check if dark mode is active
   */
  isDarkMode() {
    return this.theme === 'dark';
  }

  /**
   * Check if light mode is active
   */
  isLightMode() {
    return this.theme === 'light';
  }
}

// Initialize theme manager when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  window.themeManager = new ThemeManager();
});

// Export for module usage
if (typeof module !== 'undefined' && module.exports) {
  module.exports = ThemeManager;
}

// Global function for external access
window.ToggleTheme = () => {
  if (window.themeManager) {
    window.themeManager.toggleTheme();
  }
};

// Utility functions
window.ThemeUtils = {
  getCurrentTheme: () => window.themeManager?.getCurrentTheme() || 'light',
  setTheme: (theme) => window.themeManager?.setTheme(theme),
  isDarkMode: () => window.themeManager?.isDarkMode() || false,
  isLightMode: () => window.themeManager?.isLightMode() || false,
  resetToSystem: () => window.themeManager?.resetToSystemPreference()
};
