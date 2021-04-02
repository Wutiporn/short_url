<?php

namespace App\Http\Controllers;

use App\ShortUrl;
use Illuminate\Http\Request;

class NewController extends Controller
{
    //
    public function index(){
//        $shorturl = ShortUrl::all();
        return view('new');
    }
    public function store(Request $request){
    $request -> validate([
        'long_url' => 'required',
        'short_url' => 'required'
    ]);
    $shorturl = new ShortUrl;
    $shorturl -> long_url = $request->get('long_url');
    $shorturl -> short_url = $request->get('short_url');
    $shorturl -> save();

    return redirect('/new')->with('success','Short URL created');

    }
}
