<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Menu;


class SubMenu extends Model
{
	protected $guarded = [];


	/* RELASI */
	public function menu(){
		return $this->belongsTo(Menu::class);
	}

}
