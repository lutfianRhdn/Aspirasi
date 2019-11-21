<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\SubMenu;

class SubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::with('subMenus')->get();
        $subMenus = SubMenu::with('menu');

        if (request()->has('s')) {
            if (request('s') == "") {

                $subMenus = $subMenus;
            } else {

                $subMenus = $subMenus->where('sub_menu', 'LIKE', '%' . request('s') . '%');
            }
        }

        $subMenus = $subMenus->paginate(5);

        return view('admin.subMenu.index', compact('subMenus', 'menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::with('subMenus')->get();

        return view('admin.subMenu.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SubMenu::create(request()->validate([
            'menu_id' => 'required',
            'sub_menu' => 'required',
            'url' => ''
        ]));

        return redirect(route('sub-menus.index'));
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
    public function edit(SubMenu $subMenu)
    {
        $menus = Menu::all();
        return view('admin.subMenu.edit', compact('subMenu', 'menus'));
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
        $subMenu = request()->validate([
            'sub_menu' => 'required',
            'menu_id' => 'required'
        ]);
        SubMenu::where('id', $id)->update($subMenu);

        return redirect()->route('sub-menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubMenu $subMenu)
    {
        $subMenu->delete();

        return redirect()->route('sub-menus.index');
    }

    public function get()
    {
        return SubMenu::findOrFail(request('id'));
    }
}
