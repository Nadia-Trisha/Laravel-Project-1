@extends ('Layouts.app')

@section('title', 'Home page')

@section('content')



<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Subject</th>
        <th scope="col">Message</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($messeges as $item)
            
        
      <tr>
        <th scope="row">1</th>
        <td>{{$item['name']}}</td>
        <td>{{$item['email']}}</td>
        <td>{{$item['subject']}}</td>
        <td>{{$item['messege']}}</td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
    



@endsection

