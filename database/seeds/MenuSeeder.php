<?php

use Illuminate\Database\Seeder;
use App\Menu;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
        	
        	[
        		'menu' => 'admin',
        		'icon' => 'fa-user-shield'
        	],
        	[
        		'menu' => 'user',
        		'icon' => 'fa-users'
        	],
        	[
        		'menu' => 'menu',
        		'icon' => 'fa-folder-minus'
        	],
        	[
        		'menu' => 'aspiration',
        		'icon' => 'fa-mail'
        	]
        ];

        foreach($menus as $menu){
        	Menu::create($menu);
        }
    }
}
