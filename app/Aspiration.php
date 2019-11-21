<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AspirationCategory;
use App\Upvote;
use App\User;
use App\Comment;
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

	public function user(){
		return $this->belongsTo(User::class);
	}

	public function comments(){
		return $this->hasMany(Comment::class);
	}
	// public function popularAspirations(){
	// 	return DB::table('aspirations')->join('likes', 'aspirations.id' , '=' , 'likes.aspirations_id')->where('count(*)', '>', 5)->get();
	// }


}
