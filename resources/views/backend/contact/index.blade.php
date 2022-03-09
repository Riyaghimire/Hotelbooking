@extends('dashboard')
 
@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Contact </h1>
    <div>
    <a href="{{ route('contact.create')}}" class="btn btn-primary mb-3">Add </a>
    </div>     
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
    @elseif(session()->get('danger')) 
    <div class="alert alert-danger">
        {{ session()->get('danger') }}  
      </div>
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Fullname</td>
          <td>Email </td>
          <td>Description</td>
    
          <td>Updated at</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($contact as $contactus)
        <tr>
            <td>{{$contactus->id}}</td>
            <td>{{$contactus->fullname}} </td>
            <td>{{$contactus->email}} </td>
            
            <td>{{ $contactus->body }}</td>
            
            <td>{{$contactus->updated_at}}</td>
            <td>
                <a href="{{ route('contact.edit',$contactus->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('contact.destroy', $contactus->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection