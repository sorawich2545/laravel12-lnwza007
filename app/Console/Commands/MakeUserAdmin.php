<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:make-admin {email : Email ของผู้ใช้ที่จะเปลี่ยนเป็น admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'เปลี่ยนผู้ใช้ให้เป็น admin ตาม email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        
        $user = User::where('email', $email)->first();
        
        if (!$user) {
            $this->error("ไม่พบผู้ใช้ที่มี email: {$email}");
            return 1;
        }
        
        if ($user->isAdmin()) {
            $this->warn("ผู้ใช้ {$email} เป็น admin อยู่แล้ว");
            return 0;
        }
        
        $user->update(['role' => 'admin']);
        
        $this->info("เปลี่ยนผู้ใช้ {$email} เป็น admin เรียบร้อยแล้ว");
        
        return 0;
    }
}
