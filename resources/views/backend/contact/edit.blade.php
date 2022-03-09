@extends('dashboard') 
@section('content')
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
        <form method="post" action="{{ route('contact.update', $contact->id) }}" enctype="multipart/form-data">
            @method('PUT') 
            @csrf
            <input type="hidden" name="id" value="{{ $contact->id }}">
            <div class="form-group">
                <label for="fullname">Fullname</label>
                <input type="text" class="form-control" name="fullname" value="{{ $contact->fullname }}" />
            </div>
 
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="{{ $contact->email}}" />
            </div>
        
           <div class="form-group">
                <label for="body">Description</label>
                <input type="text" class="form-control" name="body" value="{{ $contact->body}}" />
            </div>
            
            <div>
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection