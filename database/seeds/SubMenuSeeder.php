<?php

use Illuminate\Database\Seeder;
use App\Menu;
use App\SubMenu;

class SubMenuSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$subMenus = [
			// admin
			[
				'menu_id' => Menu::where('menu', 'admin')->get()->first()->id,
				'sub_menu' => 'Dashboard',
				'url' => 'admins.index'
			],

			// user
			[
				'menu_id' => Menu::where('menu', 'user')->get()->first()->id,
				'sub_menu' => 'User Management',
				'url' => 'admin-users'
			],

			// menu
			[
				'menu_id' =>  Menu::where('menu', 'menu')->get()->first()->id,
				'sub_menu' => 'Menu Management',
				'url' => 'menus.index'
			],
			[
				'menu_id' =>  Menu::where('menu', 'menu')->get()->first()->id,
				'sub_menu' => 'Sub Menu Management',
				'url' => 'sub-menus.index'
			],

			// aspiration
			[
				'menu_id' =>  Menu::where('menu', 'aspiration')->get()->first()->id,
				'sub_menu' => 'Aspiration Management',
				'url' => 'menus.index'
			],

			[
				'menu_id' =>  Menu::where('menu', 'aspiration')->get()->first()->id,
				'sub_menu' => 'Aspiration Category Management',
				'url' => 'categories.index'
			]

		];

		foreach ($subMenus as $subMenu) {
			SubMenu::create($subMenu);
		}
	}
}
