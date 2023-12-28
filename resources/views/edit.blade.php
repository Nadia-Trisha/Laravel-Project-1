@extends ('Layouts.app')

@section('title', 'Home page')

@section('content')

<H1>Edit Contact Page</H1>
  

{{--for Requred Allert Error--}}
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Success data --}}
@if (session('msg'))
    <div class="alert alert-success">
      {{session('msg')}}
    </div>

    @endif



      


<h3>Contact Form</h3>

<div class="container">
    <form method="post" action="/contact/update/{{$single['id']}}">
        @csrf

        <div class="mb-3">
          <label for="exampleInputname" class="form-label">Enter your name</label>
          <input type="text" name="name" value="{{ old('name')? old('name'):$single['name']}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" value="{{ old('email')? old('email'):$single['email']}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

          @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

        </div>

        <div class="mb-3">
          <label for="exampleInputsubject" class="form-label">Subject</label>
          <input type="name" name="subject" value="{{ old('subject')? old('subject'):$single['subject']}}" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="mb-3">
          <label for="exampleInputmessege" class="form-label">Message</label>
          <input type="text" name="messege" value="{{ old('messege')? old('messege'):$single['messege']}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('messege')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
</div>
  
  

@endsection




<?php 
  //$array =array ['sun', 'mango'];
   //echo($array);
?>