<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Aspiration;
use App\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::with(Role);


        $users = $users->get();


        return view('user.index', compact('users'));
        // return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $aspirations = Aspiration::where('user_id', $user->id)->where('is_anonim', 'IS NOT', 0)->get();
        return view('user.show', compact('user', 'aspirations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::where('id', request('id'))->update(request()->validate([
            'name' => 'required',
            'email' => 'required',
            'id' => 'required',
            'status' => ''
        ]));

        return redirect()->route('aspirations.profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::destroy($id);
        return redirect()->back();
    }
    public function dataTableList()
    {
        // Role
        $users = User::with('role');

        // $action = view('user.link', compact('users'))->render();
        $users = $users->get();
        return datatables($users)->addIndexColumn()->addColumn('action', function ($user) {
            return view('layouts.link', ['data' => $user, 'link' => 'users'])->render();
        })
            ->addColumn('roles', function ($isAdmin) {
                $admin = $isAdmin->is_admin == 1 ? 'admin' : 'user';
                return $admin;
            })
            ->make(true);
    }
}
