{{-- @extends('frontend.layouts.main')
@section('main-container')
<table>
    <thead>
        <th>
            name

        </th>
        <th>
            price

        </th>
    </thead>
    <tbody>
        @foreach ($Accomodations as $accomodation  )
        <tr>
            <td> {{ $accomodation->name }}
            </td>
            <td> {{ $accomodation->price }}
            </td>
        </tr>
        
            
        @endforeach

        
        

    </tbody>
</table>

@endsection --}}


@extends('backend.examples.base')
 
@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Examples</h1>
    <div>
    <a href="{{ route('examples.create')}}" class="btn btn-primary mb-3">Add </a>
    </div>     
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Image</td>
          <td> Name</td>
          <td>Price</td>
    
          <td>Updated at</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($examples as $example)
        <tr>
            <td>{{$example->id}}</td>
            <td>
                <img src="{{ asset("image/".$example->image) }}" width="300px" alt=""><td>
            <td>{{$example->name}} </td>
            <td>{{$example->price}}</td>
            
            <td>{{$example->updated_at}}</td>
            <td>
                <a href="{{ route('examples.edit',$example->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('examples.destroy', $example->id)}}" method="post">
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