<?php

namespace App\Console\Commands;

use App\Models\AdminUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'admin:create {--name=} {--email=} {--password=}';
    protected $description = 'Create a new admin user';

    public function handle()
    {
        $name = $this->option('name') ?: $this->ask('Name');
        $email = $this->option('email') ?: $this->ask('Email');
        $password = $this->option('password') ?: $this->secret('Password');

        if (AdminUser::where('email', $email)->exists()) {
            $this->error('Admin user with this email already exists!');
            return 1;
        }

        AdminUser::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'super_admin',
        ]);

        $this->info("Admin user created successfully!");
        $this->line("Email: {$email}");

        return 0;
    }
}
