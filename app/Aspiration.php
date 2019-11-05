<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AspirationCategory;
use App\Upvote;
use DB;

class Aspiration extends Model
{

	protected $guarded = [];

	/*
		RELASI
	*/
	public function aspirationCategory(){
		return $this->belongsTo(AspirationCategory::class);
	}

	public function upvotes(){
		return $this->hasMany(Upvote::class);
	}

	// public function popularAspirations(){
	// 	return DB::table('aspirations')->join('likes', 'aspirations.id' , '=' , 'likes.aspirations_id')->where('count(*)', '>', 5)->get();
	// }


}
