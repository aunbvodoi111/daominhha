<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $data = [['name' => 'Đào Minh Hà', 'email' => 'hamieu1@gmail.com', 'password' => bcrypt('hamieu')]];
        // DB::table('users')->insert($data);
        DB::table('users')->insert([
            'name' => 'Đào Minh Hà',
            'email' => 'hamieu1@gmail.com',
            'password' => bcrypt('hamieu'),
        ]);
    }
}
