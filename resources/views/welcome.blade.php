@extends('layouts.welcome_layout')

@section('content')


<div id="fullpage">
      <section class="section s1">
        <h1>Showcase</h1>
        <div class="description">
        <p>Sell and showcase your paintings </p>
        <button type="button" class="welcome-buttons">Get started</button>
        </div>
        <img src="imgs/paintings1.jpg" class="paintings s1" />
      </section>
      <section class="section s2">
        <h1>Discover</h1>
        <div class="description">
        <p>Discover new paintings to buy</p>
        <button type="button" class="welcome-buttons">Explore</button>
        </div>
        <img src="imgs/paintings2.jpg" class="paintings s2" />
      </section>
      <section class="section s3">
        <h1>Upvote</h1>
        <div class="description">
        <p>Upvote your favorite paintings</p>
      </div>
        <img src="imgs/upvote.png" class="paintings s3" />
      </section>
    </div>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js"
      integrity="sha256-fIkQKQryItPqpaWZbtwG25Jp2p5ujqo/NwJrfqAB+Qk="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"
      integrity="sha256-lPE3wjN2a7ABWHbGz7+MKBJaykyzqCbU96BJWjio86U="
      crossorigin="anonymous"
    ></script>
    <script src="js/fullpage.min.js"></script>
@endsection


