<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                    ['name' => 'admin name', 'email' => 'admin@example.com', 'password' => bcrypt('123456'), 'role_id' => config('seed.admin')],
                    ['name' => 'user name', 'email' =>'user@example.com', 'password' => bcrypt('123456'), 'role_id' => config('seed.user')],
                ]);
    }
}
