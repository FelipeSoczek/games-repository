@extends('layouts.master')
 
@section('content')
 
    <h2>Add a game</h2>
 
    <form method="post" action="/games" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="titleid" class="col-sm-3 col-form-label">Game Title</label>
            <div class="col-sm-9">
                <input name="title" type="text" class="form-control" id="titleid" placeholder="Game Title" required value="{{ old('title') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="publisherid" class="col-sm-3 col-form-label">Game Publisher</label>
            <div class="col-sm-9">
                <input name="publisher" type="text" class="form-control" id="publisherid"
                       placeholder="Game Publisher" required value="{{ old('publisher') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="releasedateid" class="col-sm-3 col-form-label">Release Date</label>
            <div class="col-sm-9">
                <input name="releasedate" type="text" class="form-control" id="releasedateid"
                       placeholder="Release Date" required value="{{ old('releasedate') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="gameimageid" class="col-sm-3 col-form-label">Game Image</label>
            <div class="col-sm-9">
                <input name="image" type="file" id="gameimageid" class="custom-file-input" required value="{{ old('image') }}">
                <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Submit Game</button>
            </div>
        </div>
        @include('partials.formerrors')
    </form>
 
@endsection