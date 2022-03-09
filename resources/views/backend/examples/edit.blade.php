@extends('backend.examples.base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Editing </h1>
 
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('examples.update', $examples->id) }}" enctype="multipart/form-data">
            @method('PUT') 
            @csrf
            <input type="hidden" name="id" value="{{ $examples->id }}">
            <div class="form-group">
 
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $examples->name }}" />
            </div>
 
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" value="{{ $examples->price}}" />
            </div>
        
            <div class="form-group">
                <label for="price">Image</label>
                <input type="file" name="image" class="form-control" placeholder="image">
                <img src="/image/{{ $examples->image }}" width="500px">
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection