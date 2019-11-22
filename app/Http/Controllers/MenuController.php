<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $requests)
    {

        // $menus = Menu::with('subMenus');


        // if (request()->has('s')) {
        //     if (request('s') == "") {

        //         $menus = $menus;
        //     } else {

        //         $menus = $menus->where('menu', 'LIKE', '%' . request('s') . '%');
        //     }
        // }
        // $menus = $menus->get();


        return view('admin.menu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::with('subMenus')->get();

        return view('admin.menu.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Menu::create(request()->validate([
            'icon' => 'required',
            'menu' => 'required'
        ]));

        return redirect()->route('menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //


        return view('admin.menu.edit', compact('menu'));
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
        $menu = request()->validate([
            'menu' => 'required'
        ]);

        Menu::where('id', $id)->update($menu);

        return redirect()->route('menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menus.index');
    }


    public function get(Menu $menu)
    {
        return $menu;
    }

    public function getMenuList()
    {
        $menu = Menu::with('subMenus')->get();
        return datatables($menu)->addIndexColumn()->addColumn('action', function ($menu) {
            return view('layouts.link', ['data' => $menu, 'link' => "menus"])->render();
        })
            ->addColumn('subMenuCount', function ($menu) {
                return $menu->subMenus->count();
            })
            ->make();
    }
}
