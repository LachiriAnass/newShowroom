@extends('layouts.app')

@section('content')
<div class="container profile-container">

    <div class="card text-center">
        <div class="card-body">
            <img class="profile-img" src="/storage/public/profile/{{$user->image}}" alt="">
            <div class="profile-content">
                <h1>{{$user->name}}</h1>
            </div>
            <hr>
            <h3 class="text-left">Artist's galleries</h3>
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
                    This artist doesn't have any galleries yet!!
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<br><br>

@auth
@if(Auth::user()->id == $user->id)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Modify Profile Informations</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="form-group">
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    </div>
                    @endif
                    <form action="/modify_profile/{{$user->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Profile Name</label>
                            <input type="text" value="{{$user->name}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Profile Email</label>
                            <input type="text" value="{{$user->email}}" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlFile1">Profile Picture</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
@endif

@endsection
