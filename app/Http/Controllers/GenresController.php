<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Validator;
class GenresController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('genres')->select('Name', 'GenreId');
        $genres = $query->get();
        return view('genres', [
           'genres' => $genres
        ]);
    }
    public function edit($genreid) {
       $genre =  DB::table('genres')->where('GenreId', '=', $genreid)->first();
       return view('editGenre', [
           'genre' => $genre
       ]);
    }
    public function store($genreid, Request $request) {
       
        $input = $request->all();
        $validation = Validator::make($input, [
            'genre' => 'required|min:3|unique:genres,Name'
        ]);

        if($validation->fails()) {
            return redirect('/genres/'.$genreid.'/edit')
                ->withInput()
                ->withErrors($validation);
        }
   
        DB::table('genres')
            ->where('GenreId', '=', $genreid)
            ->update(['Name' => $request->genre]);
    
        return redirect('./genres');
    }
}
