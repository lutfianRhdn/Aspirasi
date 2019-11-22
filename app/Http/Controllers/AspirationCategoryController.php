<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AspirationCategory;


class AspirationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($categories);
        $categories = new AspirationCategory();

        $categories = $categories->get();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = request()->validate([
            'category' => 'required',
            'image' => 'required',
            'email_address' => 'required|email'
        ]);

        AspirationCategory::create($data);

        return redirect(route('categories.index'));
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
    public function edit(AspirationCategory $category)
    {
        return view('admin.category.edit', compact('category'));
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
        $data = request()->validate([
            'category' => 'required',
            'image' => 'required',
            'email_address' => 'required|email'
        ]);

        AspirationCategory::where('id', request('id'))->update($data);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AspirationCategory::where('id', $id)->delete();

        return redirect()->back();
    }
    public function getCategoriesList()
    {
        $categories = AspirationCategory::get();
        return datatables($categories)->addIndexColumn()
            ->addColumn('action', function ($category) {
                return view('layouts.link', ['data' => $category, 'link' => 'categories'])->render();
            })
            ->addColumn('icon', function ($icons) {
                // $img = view();
                return  view('aspiration.ajax.img',compact('icons'));
            })
            ->make();
    }
}
