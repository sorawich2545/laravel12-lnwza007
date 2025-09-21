<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ListUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'แสดงรายชื่อผู้ใช้ทั้งหมด';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();
        
        if ($users->isEmpty()) {
            $this->info('ไม่มีผู้ใช้ในระบบ');
            return 0;
        }
        
        $this->info('รายชื่อผู้ใช้ทั้งหมด:');
        $this->line('');
        
        $headers = ['ID', 'Name', 'Email', 'Role', 'Created At'];
        $rows = [];
        
        foreach ($users as $user) {
            $rows[] = [
                $user->id,
                $user->name,
                $user->email,
                $user->role === 'admin' ? '🔑 Admin' : '👤 User',
                $user->created_at->format('Y-m-d H:i:s'),
            ];
        }
        
        $this->table($headers, $rows);
        
        return 0;
    }
}
