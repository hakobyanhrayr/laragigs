<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Auth\AuthManager;

class ListingController extends Controller
{
    //show All Listings
    public function index(){
        return view('listings.index', [
            'listings'=> Listing::latest()->filter(request(['tag','search']))->paginate(4)
        ]);
    }

    //show Single Listing
    public function show(Listing $listing){
        return view('listings.show',[
            'listing'=>$listing
        ]);
    }

    //show Create Form

    public function create(){
        return view('listings.create');
    }

    //store post

    public function store(Request $request){
        $formFields = $request->validate([
            'title'=> 'required',
            'company'=> ['required', Rule::unique('listings','company')],
            'location'=> 'required',
            'website'=> 'required',
            'email'=> [ 'required', 'email'],
            'tags'=> 'required',
            'description'=> 'required',
        ]);

         if ($request->hasFile('logo')){
//             $formFields['logo'] = $request->file('logo')->store('images','local');
//             $formFields['logo'] = $request->file('logo')->store('images');
             $formFields['logo'] = Storage::disk('public')->put('images', $request->file('logo'));
         }
//         dd(Auth::id());
         $formFields['user_id'] = Auth::id();
//          dd($formFields);
         $tt = Listing::create($formFields);
//             dd($tt);
         return redirect('/')->with('message','Listing Create successfully!');
    }

    //edit post
    public function edit(Listing $listing)
    {
        if(Auth::id() == $listing->user_id){
            return view('listings.edit',
                ['listing'=>$listing]);
        }else{
            return redirect('/');
        }

    }

    //Update post

    public function update(Request $request, Listing  $listing)
    {
        $formFields = $request->validate([
            'title'=> 'required',
            'company'=> ['required'],
            'location'=> 'required',
            'website'=> 'required',
            'email'=> [ 'required', 'email'],
            'tags'=> 'required',
            'description'=> 'required',
        ]);

        if ($request->hasFile('logo')){
            $formFields['logo'] = Storage::disk('public')->put('images', $request->file('logo'));
        }

        $listing->update($formFields);

        return redirect('/')->with('message','Listing Update successfully!');
    }
    //delete post

    public function delete(Listing  $listing)
    {
        if(Auth::id() == $listing->user_id){
            $listing->delete();

            return redirect('/')->with('message','Listing Delete successfully!');

        }else{
            return redirect('/');
        }

    }

    public function manage(Listing $listing)
    {
        if(Auth::id() == $listing->user_id){
            return view('listings.manage',
                ['listings'=> auth()->user()->listings()->get()]);
        }
        return redirect('/');
    }
}
// cache:clear
// cache:forget
// cache:table

// php artisan cache:clear
// php artisan config:clear
// php artisan config:cache
