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
        $data['messages'] = $contacts ;
        // print_r($data);
        return view('contactList', $data);
    }

    public function delete($mid){
        echo $mid;
        $contact = Contact::find($mid);
        $contact->delete();
        return redirect('contact/list')->with('msg','Deleted successfully');
    }



    public function edit($id){
        $contact= Contact::find($id);
        $data['single'] =$contact;
        return view('edit',$data);
       
    }


    public function update(Request $request, $id){
        $contact = Contact::find($id);

        $contact = new contact();

        $message =[
        'name.required' => ' name please',
        'name.min' => ' name boro den',
        'email.required' => 'please email',
        
     ];


       $validate =$request->validate([
            'name' => 'required|min:4|max:250',
            'email' => 'email',
            'messege' => 'required|min:2'
], $message); 

    if($validate){
        $data =[
        'name' =>$request->name,
        'email'=> $request->email,
        'subject'=> $request->subject,
        'messege'=> $request->messege,

        ];

        $contact->insert($data);
        return redirect('contact')->with('msg','Your data has updated');

    }
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
            'messege' => 'required|min:2'
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
