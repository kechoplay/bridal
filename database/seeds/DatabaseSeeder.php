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
         $this->call(makeUser::class);
    }
}

class makeUser extends Seeder
{
    public function run()
    {
        \App\User::insert([
            'username' => 'admin',
            'password' => bcrypt('admin')
        ]);
    }
}
