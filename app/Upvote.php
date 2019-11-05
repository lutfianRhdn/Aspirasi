<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Aspiration;
class Upvote extends Model
{
    protected $guarded = [];


    /*
		RELASI
    */
	public function aspiration(){
		return $this->belongsTo(Aspiration::class);
	}
}
