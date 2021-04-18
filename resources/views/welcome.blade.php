@extends('template')

@section('content')
<div class="container">
  <h1 align="center">My gallery</h1>

  <div class="row">
    @foreach ($imagesInView as $image)
      <div class="col-md-3" class="gallery-item">
        <div>
          <img src="/{{ $image->image }}" alt="img" class="img-thumbnail">
        </div>
        <a href="/show/{{ $image->id }}" class="btn btn-info">View</a>
        <a href="/edit/{{ $image->id }}" class="btn btn-warning">Edit</a>
        <a href="/delete/{{ $image->id }}" class="btn btn-danger">Delete</a>
      </div>
    @endforeach
  </div>
</div>
@endsection
