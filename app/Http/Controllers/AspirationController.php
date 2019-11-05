<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AspirationCategory;
use App\Aspiration;
use App\Upvote;
use DB;

class AspirationController extends Controller
{


    /* HELPER METHOD */
    //get the popular aspirations
    private function popularAspirations($aspirations){

        $popularAspirations = [];

        // filter data from 7 days back
        foreach ($aspirations as $aspiration) {
            if($aspiration->created_at > now()->addDays(-7)){
                $popularAspirations[] = $aspiration;
            }
        }

        return $popularAspirations;

    }

    /* RESOURCE METHOD*/
    public function index(){
        
        // get the data from between 7 days back
        $aspirations = Aspiration::withCount('upvotes')->orderBy('upvotes_count', 'DESC')->with('aspirationCategory')->get();

        // filter the data with many likes
        $popularAspirations = $this->popularAspirations($aspirations);
        
        
        return view('aspiration.index', compact('popularAspirations') );
    }

    public function create(){
    	$categories = AspirationCategory::all();

    	return view('aspiration.create', compact('categories') );
    }

    public function store(){

    	Aspiration::create(request()->validate([
	    		'aspiration_category_id' => 'required',
	    		'title' => 'required' ,
	    		'aspiration' => 'required'
    		])
    	);

		return redirect(route('aspirations.index'))->with('message', 'Data had been added');
    }

    public function destroy(Aspiration $aspiration){

    	$aspiration->delete();

    	return redirect(route('aspirations.index'));

    }


    /* CUSTOM METHOD */
    public function beranda(){

        $categories = AspirationCategory::with('aspirations')->get();

        $aspirations = Aspiration::withCount('upvotes')->with('aspirationCategory')->get();
        
        if(request()->has('c')){
            $aspirations = Aspiration::where('aspiration_category_id', request('c'))->withCount('upvotes')->with('aspirationCategory')->orderBy('created_at', 'DESC')->get();
        
        }

        if(request()->has('o')){
            $aspirations = $this->popularAspirations($aspirations);
            $aspirations = new Aspiration;
            $aspirations = $aspirations->withCount('upvotes')->where('aspiration_category_id', request('c'))->orderBy('upvotes_count', 'DESC')->get();
        }

        if(request()->has('new')){
            $aspirations = Aspiration::where('aspiration_category_id', request('c'))->withCount('upvotes')->with('aspirationCategory')->orderBy('created_at', 'DESC')->get();
            
        }
        // dd($aspirations);
        return view('aspiration.beranda', compact('aspirations', 'categories'));
    }

    public function upvote(){
        Upvote::create(request()->validate([
            'aspiration_id' => 'required'
            ])
        );
        
        return redirect()->back();
    }

}
