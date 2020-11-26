<?php

use Illuminate\Database\Seeder;
use App\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
        	[
        		'role' => 'admin',
        	],
        	[
        		'role' => 'user',
        	]
        ];
        foreach($roles as $role) {
    	    Role::create($role);
        }
    }
}
