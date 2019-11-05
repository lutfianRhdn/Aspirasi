<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Aspiration;

class AspirationCategory extends Model
{
    protected $guarded = [];


    /* RELASI */
    public function aspirations(){
    	return $this->hasMany(Aspiration::class);
    }
}
