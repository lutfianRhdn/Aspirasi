<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index(){
    	$users = new User();
    	if(request()->has('s')){
    		$users = $users->where('name', 'LIKE' ,'%' . request('s') . '%')->paginate(10);
    	}else{
    		$users = $users->paginate(10);
    	}
    	return view('admin.index', compact('users'));
    }
}
