@extends('layouts.app')

@section('content')
<div class="container margin-top-50">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Painting</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="form-group">
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    </div>
                    @endif
                    <form action="/create_painting" method="POST" enctype="multipart/form-data">
                    @csrf
                   <div class="form-group">
                            <label for="paintingTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="paintingTitle" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="paintingDesc">Description</label>
                            <input type="text" name="description" class="form-control" id="paintingDesc" aria-describedby="emailHelp">
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">For sale?</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="for_sale" id="gridRadios1" value="true" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    True
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="for_sale" id="gridRadios2" value="false">
                                <label class="form-check-label" for="gridRadios2">
                                    False
                                </label>
                                </div>
                            </div>
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <label for="paintingPrice">Price ( If for sale ) in US Dollars $ :</label>
                            <input type="text" name="price" class="form-control" id="paintingPrice" aria-describedby="emailHelp">
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlFile1">Picture</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
