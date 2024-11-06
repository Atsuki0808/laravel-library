<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Author;

class AuthorController extends Controller
{

    const LOCAL_STRAGE_FOLDER = "image/";
    private $author;
    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_authors = $this->author->latest()->get();

        return view('authors.index')
        ->with('all_authors',$all_authors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->author->name = $request->name;
        $this->author->save();
        return redirect()->route('author.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = $this->author->findOrFail($id);
        //return view('authors.edit',compact('sections'))->with('author',$author); 
        return view('authors.edit')->with('author',$author); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $author = $this->author->findOrFail($id);
        $author->name = $request->input('name');
        $author->save();

        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->author->destroy($id);
        return redirect()->route('author.index');
    }
}
