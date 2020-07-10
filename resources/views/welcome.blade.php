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
    <div class="carousel-img" style="background-image: url('imgs/paintings.jpg');">
        <div class="blackish"></div>
    </div>
    <div class="carousel-caption">
      <h1 class="headers">Discover</h1>
      <p class="para">Discover new paintings</p>
    </div>
  </div>

  <div class="carousel-item">
    <div class="carousel-img" style="background-image: url('imgs/paint.png');">
        <div class="blackish"></div>
    </div>
    <div class="carousel-caption">
      <h1 class="headers">Upvote</h1>
      <p class="para">Upvote your favorite artists</p>
    </div>
  </div>

  <div class="carousel-item">
    <div class="carousel-img" style="background-image: url('imgs/coast-painting.jpg');">
        <div class="blackish"></div>
    </div>
    <div class="carousel-caption">
      <h1 class="headers">Upload</h1>
      <p class="para">Upload your own paintings</p>
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

<br>

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


