@extends('layout')

@section('title', 'Add a Track')

@section('main')
    <div class="row">
        <div class="col">
            <form action="/tracks/store" method="post" id="addform">
                @csrf
                <div class="form-group col-6 mx-auto">
                    <!-- Name -->
                    <label for="name">Name</label>
                    <input type="text" id='name' name="name" class="form-control" value="{{old('name')}}">
                    <small class="text-danger">{{$errors->first('name')}}</small><br/>
                    <!-- Albums -->
                    <label for="albums">Albums</label><br/>
                    <select class='form-control' name="albums" id='albums' form="addform">
                        @forelse($albums as $album)
                            <option value={{$album->AlbumId}} {{$album->AlbumId == old('albums') ? 'selected' : ''}}>{{$album->Title}}</option>
                        @empty
                            <option value='no available'>No Album Available</option>
                        @endforelse
                    </select>
                    <small class="text-danger">{{$errors->first('albums')}}</small><br/>
                    <!-- Media Type -->
                    <label for="media">Media Types</label><br/>
                    <select class='form-control' name="media" id='media' form="addform">
                        @forelse($media as $media_type)
                            <option value={{$media_type->MediaTypeId}} {{$media_type->MediaTypeId == old('media') ? 'selected' : ''}}>{{$media_type->Name}}</option>
                        @empty
                            <option value='no available'>No Media Available</option>
                        @endforelse
                    </select>
                    <small class="text-danger">{{$errors->first('media')}}</small><br/>
                    <!-- Genres -->
                    <label for="genres">Genres</label><br/>
                    <select class='form-control' name="genres" id='genres' form="addform">
                        @forelse($genres as $genre)
                            <option value={{$genre->GenreId}} {{$genre->GenreId == old('genres') ? 'selected' : ''}}>{{$genre->Name}}</option>
                        @empty
                            <option value='no available'>No Genre Available</option>
                        @endforelse
                    </select>
                    <small class="text-danger">{{$errors->first('genres')}}</small><br/>
                    <!-- Composer -->
                    <label for="composer">Composer</label><br/>
                    <input type="text" id='composer' name="composer" class="form-control" value="{{old('composer')}}">
                    <small class="text-danger">{{$errors->first('composer')}}</small><br/>
                    <!-- Miliseconds -->
                    <label for="mili">Miliseconds</label><br/>
                    <input type="text" id='mili' name="mili" class="form-control" value="{{old('mili')}}">
                    <small class="text-danger">{{$errors->first('mili')}}</small><br/>
                    <!-- Bytes -->
                    <label for="bytes">Bytes</label><br/>
                    <input type="text" id='bytes' name="bytes" class="form-control" value="{{old('bytes')}}">
                    <small class="text-danger">{{$errors->first('bytes')}}</small><br/>
                    <!-- Unit Price -->
                    <label for="unit">Unit Price</label><br/>
                    <input type="text" id='unite' name="unit" class="form-control" value="{{old('unit')}}">
                    <small class="text-danger">{{$errors->first('unit')}}</small><br/>
                    <br/>
                    <button type="submit" class="btn btn-primary form-control">
                        Save
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection