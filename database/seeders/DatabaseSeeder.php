<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
        ]);

        $admin = User::updateOrCreate(
            ['email' => 'admin@manage.com'], 
            [
                'name' => 'Admin Central',
                'password' => Hash::make('admin123456'), 
                'email_verified_at' => now(), 
            ]
        );

        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }


        User::updateOrCreate(
            ['email' => 'user@tuproyecto.com'],
            [
                'name' => 'Usuario Test',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
            ]
        )->assignRole('user');

        
    }
}
