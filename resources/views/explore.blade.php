@extends('layouts.different_header')

@section('content')
<div class="container margin-top-50">
    <div class="justify-content-center d-flex flex-row">
    <h2>Latest</h2>
    <button type="button" class="btn btn-primary" style="margin-left:20px; font-size: 16px;">See more</button>
    </div>
    <br>
    <div class="row">

        @forelse($latest_paintings as $painting)
        <div class="col-md-3 painting-card">
            <div class="card" style="width: 17rem; margin: auto;">
            <a href="/painting/{{$painting->id}}"><img src="/storage/painting/{{ $painting->image }}" class="card-img-top card-painting-img" alt="{{ $painting->title }}"></a>
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $painting->title }}</h5>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-bottom: 50px;">
            No paintings Found !!
        </div>
        @endforelse
    </div>

    <div class="justify-content-center d-flex flex-row">
    <h2 class="text-center">Most rated</h2>
    <button type="button" class="btn btn-primary" style="margin-left:20px; font-size: 16px;">See more</button>
    </div>
    <br>
    <div class="row">
        @forelse($most_rated_paintings as $painting)
        <div class="col-md-3 painting-card">
            <div class="card" style="width: 17rem; margin: auto;">
                 <a href="/painting/{{$painting->id}}"><img src="/storage/painting/{{ $painting->image }}" class="card-img-top card-painting-img" alt="{{ $painting->title }}"></a>
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $painting->title }}</h5>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-bottom: 50px;">
            No paintings Found !!
        </div>
        @endforelse
    </div>

    <!--
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
-->
</div>
@endsection
