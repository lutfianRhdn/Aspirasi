<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Aspiration;
class Comment extends Model
{
    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function aspiration(){
        return $this->belongsTo(Aspiration::class);
    }
}
