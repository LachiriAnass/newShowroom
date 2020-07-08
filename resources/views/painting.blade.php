@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Title : {{ $painting->title }}</div>
                <img src="/storage/public/painting/{{ $painting->image }}" class="card-img-top" alt="{{ $painting->title }}">
                <div class="card-body">
                    <h5 class="card-title">Gallery name : </h5>
                    <a href="/gallery/{{$painting->gallery->id}}" class="painting-text">{{ $painting->gallery->title }}</a><br><br>
                    <h5 class="card-title">Description</h5>
                    <p class="painting-text">{{ $painting->description }}</p>

                    <a href="/painting/{{$painting->id}}" class="btn btn-primary float-right">Buy The Painting</a>
                    @auth
                    @if(Auth::user()->id == $painting->gallery->user_id)

                    <a href="/painting/{{$painting->id}}" class="btn btn-delete float-right" style="margin-right: 20px;margin-left: 20px;"
                            onclick="event.preventDefault();
                                                     document.getElementById('painting-delete-form').submit();">Delete</a>
                    <form id="painting-delete-form" action="/delete_painting/{{ $painting->id }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
