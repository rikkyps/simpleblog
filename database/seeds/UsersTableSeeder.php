<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'role'  => 'admin',
                'avatar' => '/images/user-icon.png'
            ],
            [
                'name' => 'Author',
                'email' => 'author@gmail.com',
                'password' => bcrypt('password'),
                'role'  => 'admin',
                'avatar' => '/images/author-icon.png'
            ],
        ];

        DB::table('users')->insert($users);
    }
}
