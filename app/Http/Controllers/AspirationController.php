<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\AspirationCategory;
use App\Aspiration;
use App\Upvote;
use App\User;
use App\Comment;
use App\Mail\SendAspirationMail;
use Illuminate\Support\Facades\Auth;

class AspirationController extends Controller
{


    /* HELPER METHOD */
    //get the popular aspirations
    private function popularAspirations($aspirations)
    {

        $popularAspirations = [];

        // filter data from 7 days back
        foreach ($aspirations as $aspiration) {
            if ($aspiration->created_at > now()->addDays(-7)) {
                $popularAspirations[] = $aspiration;
            } else {
                $popularAspirations[] = $aspiration;
            }
        }

        return $popularAspirations;
    }

    /* RESOURCE METHOD*/
    public function index()
    {

        // get the data from between 7 days back
        $aspirations = Aspiration::withCount('upvotes')->orderBy('upvotes_count', 'DESC')->with('user')->limit(5)->get();


        // filter the data with many likes
        $popularAspirations = $this->popularAspirations($aspirations);

        $title = 'Aspiration ';
        return view('aspiration.index', compact('popularAspirations', 'title'));
    }

    public function create()
    {
        $categories = AspirationCategory::get();
        $title = 'Buat Aspirasi';
        return view('aspiration.create', compact('categories', 'title'));
    }


    public function show(Aspiration $aspiration)
    {

        return view('aspiration.show', compact('aspiration'));
    }

    public function store()
    {

        $aspiration = Aspiration::create(request()->validate([
            'aspiration_category_id' => 'required',
            'title' => 'required',
            'user_id' => 'required',
            'aspiration' => 'required',
            'is_anonim' => 'required'
        ]));

        $data = Aspiration::where('title', $aspiration->title)->first();
        return redirect(route('aspirations.show', $data->id));
    }

    public function destroy(Aspiration $aspiration)
    {

        $aspiration->delete();

        return redirect()->back();
    }

    public function delete(Aspiration $aspiration)
    {
        $aspiration->delete();

        return redirect()->back();
    }


    /* CUSTOM METHOD */
    public function beranda()
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

        // $aspirations = $aspirations->LIMIT(5)->appends($queries);    
        // dd($aspirati ons->links());
        return view('aspiration.beranda', compact('aspirations', 'categories'));
    }

    public function upvote(Aspiration $aspiration)
    {

        request()->validate([
            'pesan' => 'required',
        ]);


        $data = Upvote::create([

            'aspiration_id' => $aspiration->id,
            'user_id' => auth()->user()->id
        ]);

        // dd($data);
        $count = Upvote::Where('aspiration_id', $data->aspiration->id);

        // if like >= SEND EMAIL HERE
        $upvote = Upvote::where('user_id', auth()->user()->id)->where('aspiration_id', $data->aspiration->id)->first();
        $name = auth()->user()->name;

        $url = route('aspirations.show', $data->aspiration->id);
        $position = $upvote->aspiration->aspirationCategory->category;
        $totalSuport = $count->count();
        $pesan = request('pesan');
        // if()
        Mail::to($upvote->aspiration->aspirationCategory->email_address)->send(new SendAspirationMail($name, $url, $position, $totalSuport, $pesan));
        // send mail
        if ($upvote->count() % 10 == 0) {
            $name = auth()->user()->name;
            // send mail

            Mail::to($upvote->aspiration->aspirationCategory->email_address)->send(new SendAspirationMail($name, $url, $position, $totalSuport, $pesan));
        }




        return redirect()->back();
    }

    public function profile()
    {

        $user = auth()->user();
        $aspirations = $user->aspirations;
        return view('user.show', compact('user', 'aspirations'));
    }

    public function search()
    {
        $search = request('search');
        $users = User::where('name', 'LIKE', '%' . request('search') . '%')
            ->orWhereHas('aspirations', function ($query) use ($search) {
                $query->where('aspiration', 'LIKE', '%' . $search . '%');
            })->paginate(5);

        $aspirations = Aspiration::where('aspiration', 'LIKE', '%' . request('search') . '%')->paginate(10);

        // dd($users);

        return view('aspiration.search', compact('users', 'aspirations'));
    }



    public function storeComment()
    {
        $comment = request()->validate([
            'aspiration_id' => 'required',
            'comment' => 'required',
        ]);


        Comment::create([
            'aspiration_id' => request('aspiration_id'),
            'comment' => request('comment'),
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back();
    }

    // ajax method


    public function aspirationAjax()
    {
        $page = request('page');
        // dd($page);

        // test 1
        // $aspirations = Aspiration::paginate(2, ['*'], 'page', $page);
        // $aspirations = Aspiration::all();

        // test 2

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

        $aspirations = $aspirations->paginate(5, ['*'], 'page', $page)->appends($queries);


        // return view('aspiration.ajax.aspiration', ['aspirations' => $aspirations]);
        // return response()->json(['html' =>  view('aspiration.beranda', compact('aspirations'))->render()]);

        return view('aspiration.ajax.aspiration', compact('aspirations'))->render();
    }

    public function ajaxSearch()
    {
        $search = request('search');
        if ($search != null) {

            $searchs = Aspiration::where('title', 'LIKE', '%' . request('search') . '%')->paginate(5);
            return view('aspiration.ajax.search', compact('searchs'))->render();
        } else {
            return null;
        }
        // $aspirations = Aspiration::where('aspiration', 'LIKE', '%' . request('search') . '%')->paginate(10);

        // dd($users);

        // return view('aspiration.search', compact('users', 'aspirations'));
    }
}
