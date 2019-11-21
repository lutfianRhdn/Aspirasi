<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\App;
use App\Aspiration;
use App\AspirationCategory;

class AdminController extends Controller
{
    public function index()
    {
        $users = new User();
        if (request()->has('s')) {
            $users = $users->where('name', 'LIKE', '%' . request('s') . '%')->paginate(10);
        } else {
            $users = $users->paginate(10);
        }
        return view('admin.index', compact('users'));
    }

    public function aspiration()
    {


        $categories = AspirationCategory::with('aspirations')->get();

        $aspirations = new Aspiration();

        $aspirations = $aspirations->withCount('upvotes');

        $queries = [];


        if (request()->has('c')) {
            $aspirations = $aspirations->where('aspiration_category_id', request('c'));
            $queries['c'] = request('c');
        }

        if (request()->has('o')) {

            if (request('o') == 'popular') {
                $popularAspirations = [];

                foreach ($aspirations as $aspiration) {

                    if ($aspiration->created_at > now()->addDays(-7)) {
                        $popularAspirations[] = $aspiration;
                    }
                    $aspirations = $popularAspirations->orderBy('upvotes_count', 'DESC');
                }
            }

            if (request('o') == 'new') {
                $aspirations = $aspirations->orderBy('created_at', 'DESC');
            }

            if (request('o') == 'accepted') {
                $aspirations = $aspirations->where('is_accepted', 1);
            }
        }

        $queries['o'] = request('o');

        $aspirations = $aspirations->paginate(5)->appends($queries);
        return view('admin.aspiration.index', compact('aspirations', 'categories'));
    }


    public function user()
    {
        $users = User::with('aspirations');
        if (request()->has('s')) {
            // dd("asdsad");
            if (request('s') == "") {

                $users = $users;
            } else {
                $users = $users->where('name', 'LIKE', '%' . request('s') . '%');
            }
        }
        // $users->get();
        $users = $users->paginate(5);
        return view('user.index', compact('users'));
    }
}
