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
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.ua',
                'password' => bcrypt(123123),
            ],
        ];
        DB::table('users')->insert($data);
    }
}
