@extends('layout')

@section('title', 'Edit Genres')

@section('main')
    <form class="form-group col-6 mx-auto" action="/genres/{{$genre->GenreId}}/store" method="post">
        @csrf
        <label for="genre">Genre</label>
        <input type="text" name="genre" id="genre" class="form-control" value={{$errors->first('genre') ? old('genre') : $genre->Name}}>
        <small class="text-danger">{{$errors->first('genre')}}</small><br/>
        <button type="submit" class="btn btn-primary form-control">
            Save
        </button>
    </form>
@endsection