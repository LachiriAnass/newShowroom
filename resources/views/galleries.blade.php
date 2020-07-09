@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">My Galleries</h1><br><br>
    <div class="row">
        @forelse($galleries as $gallery)
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
        <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-top: 50px;">
            You don't have any galleries yet!! Click the "New Gallery" to add a new one.
        </div>
        @endforelse
    </div>
</div>
@endsection
