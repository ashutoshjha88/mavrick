<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert(
            [
                'first_name' => 'Ashutosh',
                'last_name' => 'Kumar Jha',
                'username' => 'ashutosh.sce',
                'email' => 'ashutosh.sce@hotmail.com',
                'password' => Hash::make('12345'),
                'admin' => 1
            ]);

        DB::table('users')->insert(
            [
                'first_name' => 'Alok',
                'last_name' => 'Kumar Singh',
                'username' => 'alok.sce',
                'email' => 'alok.sce@hotmail.com',
                'password' => Hash::make('12345')
            ]);
        DB::table('users')->insert(
            [
                'first_name' => 'Akhil',
                'last_name' => 'Sreenivisan',
                'username' => 'akhil',
                'email' => 'akhilsreenivasan@gmail.com',
                'password' => Hash::make('12345')
            ]);
        DB::table('users')->insert(
            [
                'first_name' => 'Faraz',
                'last_name' => 'Siddiqui',
                'username' => 'faraz',
                'email' => 'farazsiddiqui007@gmail.com',
                'password' => Hash::make('12345')
            ]);
    }
}
