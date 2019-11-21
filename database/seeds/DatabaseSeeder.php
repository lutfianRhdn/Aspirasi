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
        $this->call(MenuSeeder::class);
        $this->call(SubMenuSeeder::class);
        $this->call(AspirationCategorySeeder::class);
        $this->call(RoleSeeder::class);
        factory(App\User::class, 10)->create();
        factory(App\Aspiration::class,100)->create();
        factory(App\Comment::class, 50)->create();
        factory(App\Upvote::class,1000)->create();
    }
}
