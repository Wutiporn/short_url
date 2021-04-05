<?php

namespace App\Http\Controllers;

use App\ShortUrl;
use Illuminate\Http\Request;

class NewController extends Controller
{
    //
    public function create(){
//        $shorturl = ShortUrl::all();
        $count = ShortUrl::count();
        if($count >= 10){
            return 'เกินกำหนด';
        }
        return view('new');
    }

    public function index(){
        $urls = ShortUrl::all();
        return view('index',compact('urls'));
    }
    public function store(Request $request){


        $long_url = 'http://';
        $long_url .= $request->get('long_url');
        $short_url = $this->randString();
    ShortUrl::create( [
        'long_url' => $long_url,
        'short_url' => $short_url
    ]);

//        dd($short_url);

    return redirect('/')->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');

    }

    public function randString(){
        $char = "abcdefghijklmnopqrstuvwxyz";
        $number = "1234567890";
        $string = "339";
        $charLenght =  strlen($char);
        $numLenght = strlen($number);
        for($i = 0; $i <3; $i++){
            $string.=$char[rand(0,$charLenght-1)];
        }

        for($i = 0; $i <2; $i++){
            $string.=$number[rand(0,$numLenght-1)];
        }


        return $string;
    }

    public function check($code){
//        dd($code);
        $result = ShortUrl::where('short_url',$code)->first();
        if ($result){
            return redirect()->away($result->long_url);
        }

        return 'ไม่พบรหัส Short URL นี้';
    }
}
