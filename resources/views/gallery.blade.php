@extends('layouts.app')

@section('content')
<div class="welcome-header" style="background-image: url('/storage/public/gallery/{{ $gallery->image }}');">
    <div class="blackish">
        <div class="welcome-text">
            {{ $gallery->title }}
        </div>
    </div>
</div>

<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Informations on the gallery</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="/storage/public/gallery/{{ $gallery->image }}" class="card-img-top" alt="...">
                        </div>
                        <div class="col-md-8">
                            <h4>Title : </h4>
                            <p>{{ $gallery->title }}</p>
                            <h4>Description : </h4>
                            <p>
                            {{ $gallery->description }}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>

<div class="container">
    <div class="row justify-content-center">
        @forelse($paintings as $painting)
        <div class="col-md-4 painting-card">
            <div class="card" style="width: 18rem; margin: auto;">
                <img src="/storage/public/painting/{{ $painting->image }}" class="card-img-top card-painting-img" alt="{{ $painting->title }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $painting->title }}</h5>
                    <a href="/painting/{{$painting->id}}" class="btn btn-primary">See the painting</a>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-primary text-center" role="alert" style="width:100%;">
            You don't have any painting yet!! Fill and submit the form below to add a new one.
        </div>
        @endforelse
    </div>
</div>

<br><br>
@auth
@if(Auth::user()->id == $gallery->user_id)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Upload New Painting</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="form-group">
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    </div>
                    @endif
                    <form action="/create_painting" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label for="exampleInputEmail1">Painting Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Painting Description</label>
                            <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlFile1">Painting Picture</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                        <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endif
@endauth

@endsection
