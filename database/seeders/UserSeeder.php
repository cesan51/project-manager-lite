<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::create([
            'name'      => 'Kaisof',
            'nit'       => '12345678',
            'email'     => 'antonio.dev@kaisof.com'
        ]);

        User::create([
            'name' => 'Antonio',
            'email' => 'antonio.dev@kaisof.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'role' => 'admin',
            'company_id' => $company->id,
        ]);

        User::create([
            'name' => 'Cesar',
            'email' => 'cesantonigo@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'role' => 'manager',
            'company_id' => $company->id,
        ]);

        User::create([
            'name' => 'Test',
            'email' => 'test@kaisof.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'role' => 'user',
            'company_id' => $company->id,
        ]);
    }
}
