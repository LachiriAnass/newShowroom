@extends('layouts.app')

@section('content')
<div class="container margin-top-50">
    <h1 class="text-center">My Paintings</h1><br><br>
    <div class="row">
        @forelse($paintings as $painting)
        <div class="col-md-4 painting-card">
            <div class="card" style="width: 18rem; margin: auto;">
                <img src="/storage/public/gallery/{{ $painting->image }}" class="card-img-top card-painting-img" alt="{{ $painting->title }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $painting->title }}</h5>
                    <a href="/painting/{{$painting->id}}" class="btn btn-primary">See Painting</a>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-top: 50px;">
            You don't have any paintings yet!! Click the "New Painting" to add a new one.
        </div>
        @endforelse
    </div>
</div>
@endsection
