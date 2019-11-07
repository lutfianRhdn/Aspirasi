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
        $aspirations = Aspiration::withCount('upvotes')->orderBy('upvotes_count', 'DESC')->limit(5)->get();

        // filter the data with many likes
        $popularAspirations = $this->popularAspirations($aspirations);

        
        return view('aspiration.index', compact('popularAspirations') );
    }

    public function create(){
    	$categories = AspirationCategory::all();

    	return view('aspiration.create', compact('categories') );
    }

    public function store(){
        // dd(request());
    	Aspiration::create(request()->validate([
	    		'aspiration_category_id' => 'required',
	    		'title' => 'required' ,
                'user_id' => 'required',
	    		'aspiration' => 'required',
                'is_anonim' => 'required'
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

        $aspirations = new Aspiration();

        $aspirations = $aspirations->withCount('upvotes');
        $queries = [];

        if(request()->has('c')){
            $aspirations = $aspirations->where('aspiration_category_id', request('c'));
            $queries['c'] = request('c');
        }

        if(request()->has('o')){

            if(request('o') == 'popular'){
                $popularAspirations = [];
                
                foreach ($aspirations as $aspiration) {
                    
                    if($aspiration->created_at > now()->addDays(-7)){
                        $popularAspirations[] = $aspiration;
                    }
                    $aspirations = $popularAspirations->orderBy('upvotes_count', 'DESC');   
            
                }
            }

            if(request('o') == 'new'){
                $aspirations = $aspirations->orderBy('created_at', 'DESC');
                       
            }

            if(request('o') == 'accepted'){
                $aspirations = $aspirations->where('is_accepted', 1);
                       
            }

            
        
        }


            $queries['o'] = request('o');

        $aspirations = $aspirations->paginate(5)->appends($queries);


        // dd(request()->segment(1));
        return view('aspiration.beranda', compact('aspirations', 'categories'));
    }

    public function upvote(){
        Upvote::create(request()->validate([
            'aspiration_id' => 'required'
            ])
        );
        
        return redirect()->back();
    }

    public function profile(){
        return "Profile";
    }
}
