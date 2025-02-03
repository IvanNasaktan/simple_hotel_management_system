<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Step 1: Create a Role
        $role = Role::create([
            'role' => 'employee', // Example role name
        ]);

        // Step 2: Create a User
        $user = User::create([
            'email' => 'johndoe@example.com',
            'mobile_number' => '09123456789',
            'password' => Hash::make('password123'), // Example password (hashed)
        ]);

        // Step 3: Create an Employee linked to the User and Role
        Employee::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'middle_initial' => 'A',
            'suffix' => 'Jr',
            'age' => 30,
            'user_id' => $user->id,  // Foreign key to users table
            'role_id' => $role->id,  // Foreign key to roles table
            'date_employed' => now(), // Current date
        ]);
    }
}
