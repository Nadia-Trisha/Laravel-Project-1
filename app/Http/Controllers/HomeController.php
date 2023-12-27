<?php

namespace App\Http\Controllers;

use App\Models\contact;
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

    public function contactList(){
        $contacts = Contact::all();
        $data['messeges']= " $contacts";
        return view('contactList',$data);
    }


    public function store(Request $request){
        $contact = new contact();

        $message =[
        'name.required' => ' name please',
        'name.min' => ' name boro den',
        'email.required' => 'please email',
     ];


       $validate =$request->validate([
            'name' => 'required|min:4|max:250',
            'email' => 'email',
            'messege' => 'required|min:20'
], $message); 

    if($validate){
        $data =[
        'name' =>$request->name,
        'email'=> $request->email,
        'subject'=> $request->subject,
        'messege'=> $request->messege,

        ];

        $contact->insert($data);
        return redirect('contact')->with('msg','We recieved your message');

    }
       
    }
}
