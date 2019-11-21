<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Aspiration;
use App\Comment;
use App\Upvote;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'profile_image', 'is_admin', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // public function getIsAdminAttribute($attributes){
    //     if($attributes == 1){
    //         return "Admin";
    //     }else{
    //         return "User";
    //     }
    // }
    /* RELASI */
    // public function role(){
    //     return $this->belongsTo(Role::class);
    // }

    public function aspirations()
    {
        return $this->hasMany(Aspiration::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function upvotes()
    {
        return $this->hasMany(Upvote::class);
    }

    public function delete()
    {
        // delete all related photos 
        $this->aspirations()->delete();
        $this->aspirations()->delete();
        $this->upvotes()->delete();

        return parent::delete();
    }
}
