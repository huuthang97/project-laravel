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
        DB::table('users')->insert([
            ['email' => 'huuthangk49hce1@gmail.com', 'password' => bcrypt('123456'), 'level'=>1],
            ['email' => 'dungnguyen@gmail.com', 'password' => bcrypt('123456'), 'level'=>2],
        ]);
    }
}
