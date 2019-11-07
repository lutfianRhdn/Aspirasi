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
        // $this->call(UsersTableSeeder::class);
        // $this->call(AspirationCategory::class);
        factory(App\User::class, 10)->create();
        factory(App\AspirationCategory::class,5)->create();
        factory(App\Aspiration::class,50)->create();
        factory(App\Upvote::class,500)->create();
    }
}
