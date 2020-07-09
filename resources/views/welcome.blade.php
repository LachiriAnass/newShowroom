@extends('layouts.app')

@section('content')


<div id="demo" class="carousel slide" data-ride="carousel">
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="imgs/paintings.jpg" alt="Discover" width="1100" height="500">
    <div class="carousel-caption">
      <h1 class="headers">Discover</h1>
      <p class="para" style="color:blue">Discover new paintings</p>
    </div>
  </div>
  <div class="carousel-item">
    <img src="imgs/coast-painting.jpg" alt="Follow" width="1100" height="500">
    <div class="carousel-caption">
      <h1 class="headers">Follow</h1>
      <p class="para" style="color:red">Follow your favorite artists</p>
    </div>
  </div>
  <div class="carousel-item">
    <img src="imgs/artist.jpg" alt="Upload" width="1100" height="500">
    <div class="carousel-caption">
      <h1 class="headers">Upload</h1>
      <p class="para" style="color:yellow">Upload your own paintings</p>
    </div>
  </div>
</div>

<!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
    </a>
</div>

<div class="container pt-3">
    <div class="row">

    <div class="col-sm-2">
    </div>

    <div class="col-sm-6">
    <h3 style="margin-top:5px">Create an account it's super easy !!</h3>  
    </div>

    <div class="col-sm-4">
        <a href="/register" class="btn btn-success btn-lg" role="button">Sign up</a>
     </div>
    </div>
</div>

@endsection


