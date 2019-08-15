<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        factory(\App\Employee::class, 10)->create();
        factory(\App\Employee::class, 10)->create();
        factory(\App\Employee::class, 11)->create();
        factory(\App\Employee::class, 10)->create();
        factory(\App\Employee::class, 10)->create();
    }
}
