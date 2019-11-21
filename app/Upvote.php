<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Aspiration;
use App\User;

class Upvote extends Model
{
	protected $guarded = [];


	/*
		RELASI
    */
	public function aspiration()
	{
		return $this->belongsTo(Aspiration::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
