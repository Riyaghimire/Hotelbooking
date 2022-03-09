@extends('dashboard')
 
@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Aboutus</h1>
    <div>
    <a href="{{ route('about.create')}}" class="btn btn-primary mb-3">Add </a>
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
          <td>Caption</td>
          <td> Featured</td>
          <td>Description</td>
    
          <td>Updated at</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($about as $aboutus)
        <tr>
            <td>{{$aboutus->id}}</td>
            <td>{{$aboutus->caption}} </td>
            <td>{{$aboutus->featured}}</td>
            <td>{{ $aboutus->description }}</td>
            
            <td>{{$aboutus->updated_at}}</td>
            <td>
                <a href="{{ route('about.edit',$aboutus->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('about.destroy', $aboutus->id)}}" method="post">
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