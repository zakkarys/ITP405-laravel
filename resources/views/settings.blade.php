@extends('layout')

@section('title', 'Edit Genres')

@section('main')
    <div>

        <form class="form-group mx-auto col-6" action="/settings/update" method="post">
            @csrf
            @if ($maintenanceSetting)
                <input name="maintenance" type="checkbox" value="on" class="form-control" checked>On Maintenance
            @else
                <input name="maintenance" type="checkbox" value="on" class="form-control">On Maintenance
            @endif
            <input type="submit" value="submit">
        </form>

    </div>
@endsection