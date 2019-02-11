@extends('layout')

@section('title', 'Tracks')

@section('main')
    <button onclick="window.location.href = '/tracks/new'">Add Track</button>
    <table class="table">
        <tr>
            <th>Track Name</th>
            <th>Album Title</th>
            <th>Artist Name</th>
            <th>Price</th>
        </tr>
        @forelse($tracks as $track)
            <tr>
                <td>
                    {{$track->trackName}}
                </td>
                <td>
                    {{$track->title}}
                </td>
                <td>
                    {{$track->artistName}}
                </td>
                <td>
                    {{$track->price}}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No tracks found</td>
            </tr>
        @endforelse
    </table>
@endsection
