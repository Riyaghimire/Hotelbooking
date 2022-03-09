@extends('dashboard') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update </h1>
 
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
        <form method="post" action="{{ route('about.update', $about->id) }}" enctype="multipart/form-data">
            @method('PUT') 
            @csrf
            <input type="hidden" name="id" value="{{ $about->id }}">
            <div class="form-group">
 
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $about->title }}" />
            </div>
 
            <div class="form-group">
                <label for="caption">Caption</label>
                <input type="text" class="form-control" name="caption" value="{{ $about->caption}}" />
            </div>
        
            <div class="form-group">
                <label for="featured">Featured</label>
                <input type="text" class="form-control" name="featured" value="{{ $about->featured}}" />
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" value="{{ $about->description}}" />
            </div>
            
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection