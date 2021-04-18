@extends('template')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <img src="/{{ $imageInView }}" alt="img" class="img-thumbnail gallery-img">
        </div>
      </div>
    </div>
@endsection