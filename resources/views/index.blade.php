
@extends('layout')

@section('title', 'Genres')

@section('main')
    <div class="container col-6">
        <table class="table">
            <tr>
                <th>Genres</th>
            </tr>
            @forelse($genres as $genre)
                <tr>
                    <td>
                        <a href="/tracks?genre={{$genre->Name}}">{{$genre->Name}}</a>
                        <button
                                class="btn btn-light ml-3"
                                onclick="window.location.href='genres/{{$genre->GenreId}}/edit'"
                        >
                            Edit
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No genres found</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection