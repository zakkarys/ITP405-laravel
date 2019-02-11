<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Validator;
class TracksController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('tracks');
       
        if($request->query('genre')) {
            $query->join('genres', function($join) use ($request) {
                        $join
                            ->on('genres.GenreId', '=', 'tracks.GenreId')
                            ->on('genres.Name', '=', $request->query('genre'));
                    });
        }
        $query->join('albums', 'albums.AlbumId', '=', 'tracks.AlbumId');
        $query->join('artists', 'artists.ArtistId', '=', 'albums.ArtistId');
        $query->select('tracks.Name as trackName', 'tracks.UnitPrice as price', 'albums.Title as title', 'artists.Name as artistName');
        $tracks = $query->get();
        return view('tracks', [
            'tracks' => $tracks,
            'genre' => $request->query('genre')
        ]);
    }
    public function addTrack(Request $request) {
    
        $query_album = DB::table('albums');
        $albums = $query_album->get();
        $query_media = DB::table('media_types');
        $media = $query_media->get();
        $query_genre = DB::table('genres');
        $genres = $query_genre->get();
        return view('addTracks.addTrack', [
            'albums' => $albums,
            'media' => $media,
            'genres' => $genres
        ]);
    }
    public function store(Request $request) {
     
        $input = $request->all();
        $validation = Validator::make($input, [
            'name' => 'required',
            'albums' => 'required',
            'media' => 'required',
            'genres' => 'required',
            'composer' => 'required',
            'mili' => 'required|integer',
            'bytes' => 'required|integer',
            'unit' => 'required|integer'
        ]);
      
        if($validation->fails()) {
            return redirect('/tracks/new')
                ->withInput()
                ->withErrors($validation);
        }

        DB::table('tracks')->insert(
            [
                'Name' => $request->name,
                'AlbumId' => $request->albums,
                'MediaTypeId' => $request->media,
                'GenreId' => $request->genres,
                'Composer' => $request->composer,
                'Milliseconds' => $request->mili,
                'Bytes' => $request->bytes,
                'UnitPrice' => $request->unit
            ]
        );
   
        return redirect('./tracks');
    }
}
