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
        factory(App\User::class)->create([
            'username' => 'admin',
            'password' => bcrypt('123456'),
        ]);
       factory(App\User::class, 50)->create();
    }
}
