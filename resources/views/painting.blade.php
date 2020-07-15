@extends('layouts.app')

@section('content')
<div class="container margin-top-50 margin-bottom-40">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Title : {{ $painting->title }}</div>
                <img src="/storage/public/painting/{{ $painting->image }}" class="card-img-top" alt="{{ $painting->title }}">


                <div class="card-body">

                            @auth
                            <div class="row" style="padding-bottom: 20px;">
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-primary" style="width:100%;" href="#"
                                       onclick="event.preventDefault();
                                                     document.getElementById('painting-upvote-form').submit();">
                                                     <i class="fas fa-angle-double-up"></i> {{ count($upvotes) }}
                                    </a>

                                    <form id="painting-upvote-form" action="/paintingupvote/{{ Auth::user()->id }}/{{ $painting->id }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-primary" style="width:100%;" href="#"
                                       onclick="event.preventDefault();
                                                     document.getElementById('painting-downvote-form').submit();">
                                                     <i class="fas fa-angle-double-down"></i> {{ count($downvotes) }}
                                    </a>

                                    <form id="painting-downvote-form" action="/paintingdownvote/{{ Auth::user()->id }}/{{ $painting->id }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                            @endauth


                    <h5 class="card-title">Gallery name : </h5>
                    <a href="/gallery/{{$painting->gallery->id}}" class="painting-text">{{ $painting->gallery->title }}</a><br><br>
                    <h5 class="card-title">Description</h5>
                    <p class="painting-text">{{ $painting->description }}</p>

                    @guest

                        @if($painting->for_sale)
                        <!-- Button trigger modal -->

                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
                            Buy The Painting
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Contact Informations</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Price : {{ $painting->price }} $ <br>
                                Email : {{ $painting->gallery->user->email }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        @endif

                    @else
                        @if(!(Auth::user()->id == $painting->gallery->user_id))
                        @if($painting->for_sale)
                        <!-- Button trigger modal -->

                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
                            Buy The Painting
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Contact Informations</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Price : {{ $painting->price }} $ <br>
                                Email : {{ $painting->gallery->user->email }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        @endif

                        @else

                            @if($painting->for_sale)
                                <a href="/painting_sold/{{$painting->id}}"  class="btn btn-delete float-right" style="margin-right: 20px;margin-left: 20px;"
                                        onclick="if(confirm('Are you sure?')){event.preventDefault();
                                                                document.getElementById('painting-delete-form').submit();}">Mark as sold</a>
                                <form id="painting-delete-form" action="/sold_painting/{{ $painting->id }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                            @endif

                        <a href="/painting/{{$painting->id}}"  class="btn btn-delete float-right" style="margin-right: 20px;margin-left: 20px;"
                                onclick="if(confirm('Are you sure?')){event.preventDefault();
                                                        document.getElementById('painting-delete-form').submit();}">Delete</a>
                        <form id="painting-delete-form" action="/delete_painting/{{ $painting->id }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                        @endif
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
