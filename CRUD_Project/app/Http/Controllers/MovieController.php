<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
class MovieController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $movies = Movie::orderBy('id','asc')->paginate(10);
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'director' => 'required',
            'release' => 'required'
        ]);

        Movie::create($request->post());

        return redirect()->route('movies.index')->with('success','Movie has been created successfully.');
    }

    public function show(Movie $movie)
    {
        return view('movies.show',compact('movie'));
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit',compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'director' => 'required',
            'release' => 'required',
        ]);

        $movie->fill($request->post())->save();

        return redirect()->route('movies.index')->with('success','Movie Has Been updated successfully');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('success','Movie has been deleted successfully');
    }

}
