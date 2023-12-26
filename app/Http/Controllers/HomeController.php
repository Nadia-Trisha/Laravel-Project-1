<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['title']= "Home page";
        $data['welcome']= "welcome t0 laravel";
        $data['fruits']= ["Apple","nut","mango"];
    return view('home',$data);
  
    }

    public function about (){
        $data['title']= "About page";
        return view('about',$data);
    }

    public function contact(){
        $data['title']= "Contact page";
        return view('contact',$data);
    }

    public function store(Request $request){
        echo $request->email;
        echo $request->password;
       
    }
}
