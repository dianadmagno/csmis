<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'lastname' => 'Admin',
            'firstname' => 'Admin',
            'middlename' => 'A',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret123'),
            'is_superadmin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
