@extends('dashboard')
 
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
      <form method="post" action="{{ route('about.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">    
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" required/>
          </div>
 
          <div class="form-group">
              <label for="caption">Caption</label>
              <input type="text" class="form-control" name="caption" required/>
          </div>
          
          <div class="form-group">
            <label for="featured">Featured</label>
            <input type="featured" class="form-control" name="featured" required/>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="description" class="form-control" name="description" required/>
        </div>
            
        
          <button type="submit" class="btn btn-primary">Add </button>
      </form>
  </div>
</div>
</div>
@endsection