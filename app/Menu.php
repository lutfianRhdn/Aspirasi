<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubMenu;

class Menu extends Model
{
    protected $guarded = [];


    public function subMenus(){
    	return $this->hasMany(SubMenu::class);
    }

    public function delete(){
    	$this->subMenus()->delete();

    	return parent::delete();
    }
}
