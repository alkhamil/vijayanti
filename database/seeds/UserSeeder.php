<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'checker',
            'role_id' => 2,
            'email' => 'checker@email.com',
            'password' => Hash::make('checker'),
        ]);
    }
}
