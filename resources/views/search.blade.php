@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Category : {{ $category }} - Search Text : {{ $search_text }}</h2><br><br>

        @if($category == 'all')
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Galleries</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Paintings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Artists</a>
            </li>
        </ul>
        <br>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                        No Galleries Found !!
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row justify-content-center">
                    @forelse($paintings as $painting)
                    <div class="col-md-4 painting-card">
                        <div class="card" style="width: 18rem; margin: auto;">
                            <img src="/storage/public/painting/{{ $painting->image }}" class="card-img-top card-painting-img" alt="{{ $painting->title }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $painting->title }}</h5>
                                <a href="/painting/{{$painting->id}}" class="btn btn-primary">See Painting</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-top: 50px;">
                        No Paintings Found !!
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row justify-content-center">
                    @forelse($artists as $artist)
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
                    <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-top: 50px;">
                        No Artists Found !!
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        @elseif($category == 'painting')
            <div class="row">
                @forelse($paintings as $painting)
                <div class="col-md-4 painting-card">
                    <div class="card" style="width: 18rem; margin: auto;">
                        <img src="/storage/public/painting/{{ $painting->image }}" class="card-img-top card-painting-img" alt="{{ $painting->title }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $painting->title }}</h5>
                            <a href="/painting/{{$painting->id}}" class="btn btn-primary">See Painting</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-top: 50px;">
                    No Paintings Found !!
                </div>
                @endforelse
            </div>
        @elseif($category == 'gallery')
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
                    No Galleries Found !!
                </div>
                @endforelse
            </div>

        @elseif($category == 'artist')
            <div class="row">
                @forelse($artists as $artist)
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
                <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-top: 50px;">
                    No Artists Found !!
                </div>
                @endforelse
            </div>
        @endif
</div>
@endsection
