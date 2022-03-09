{{-- @extends('frontend.layouts.main')
@section('main-container')
<form style="margin-top: 50px" action="{{ url("/accomodation/store") }}" method ="POST">
    @csrf
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required > 
    <span> {{ $errors-> first("name")}}</span><br>
    

    <label for="price">Price:</label><br>
    <input type="text" id="price" name="price" required><br>
    <span> {{ $errors-> first("price")}}</span><br>


    {{-- <label for="special">Special?</label><br>
    <input type="radio" id="special" name="special" value ="special" ><br><br> --}}
    {{-- <input type="submit" value="Submit">
 
  </form> 
@endsection --}} 

@extends('backend.examples.base')
 
@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('examples.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">    
              <label for="name">Name:*</label>
              <input type="text" class="form-control" name="name" required/>
          </div>
 
          <div class="form-group">
              <label for="price">Price:*</label>
              <input type="number" class="form-control" name="price" required/>
          </div>
          
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
        
          <button type="submit" class="btn btn-primary">Add </button>
      </form>
  </div>
</div>
</div>
@endsection
