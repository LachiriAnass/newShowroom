@extends('layouts.app')

@section('content')
<div class="container margin-top-50">
    <h1 class="text-center">Explore Art</h1><br><br>
    <h2 class="text-center">The latest galleries</h2>
    <div class="row">
        @forelse($latest_galleries as $gallery)
        <div class="col-md-4 painting-card">
            <div class="card" style="width: 18rem; margin: auto;">
                <img src="/storage/public/gallery/{{ $gallery->image }}" class="card-img-top card-painting-img" alt="{{ $gallery->title }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $gallery->title }}</h5>
                    <a href="/gallery/{{$gallery->id}}" class="btn btn-primary">See Gallery</a>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-bottom: 50px;">
            No Galleries Found !!
        </div>
        @endforelse
    </div>


    <h2 class="text-center">The most rated galleries</h2>
    <div class="row">
        @forelse($most_rated_galleries as $gallery)
        <div class="col-md-4 painting-card">
            <div class="card" style="width: 18rem; margin: auto;">
                <img src="/storage/public/gallery/{{ $gallery->image }}" class="card-img-top card-painting-img" alt="{{ $gallery->title }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $gallery->title }}</h5>
                    <a href="/gallery/{{$gallery->id}}" class="btn btn-primary">See Gallery</a>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-bottom: 50px;">
            No Galleries Found !!
        </div>
        @endforelse
    </div>


    <h2 class="text-center">The most rated paintings</h2>
    <div class="row">
        @forelse($most_rated_paintings as $painting)
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
        <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-bottom: 50px;">
            No Paintings Found !!
        </div>
        @endforelse
    </div>


    <h2 class="text-center">The most rated artists</h2>
    <div class="row">
        @forelse($most_rated_artists as $artist)
        <div class="col-md-4 painting-card">
            <div class="card" style="width: 18rem; margin: auto;">
                <img src="/storage/public/profile/{{ $artist->image }}" class="card-img-top card-painting-img" alt="{{ $artist->name }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $artist->name }}</h5>
                    <a href="/profile/{{$artist->id}}" class="btn btn-primary">Go To This Profile</a>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-bottom: 50px;">
            No Artists Found !!
        </div>
        @endforelse
    </div>
</div>
@endsection
