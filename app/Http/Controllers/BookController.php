<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    const LOCAL_STORAGE_FOLDER = "image/";
    private $book;
    public function __construct(Book $book,Author $author)
    {
        $this->book = $book;
        $this->author = $author;
    }

    public function index(){
        $all_books = $this->book->latest()->get();
        $all_authors = Author::all();
        return view('books.index')
        ->with('all_books',$all_books)
        ->with('all_authors',$all_authors);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|max:50',
            'year_published' => 'required|max:4',
            'author_id' => '',
            'cover_photo' => 'mimes:jpeg,jpg,png,gif|max:1048'
        ]);
        $this->book->title = $request->title;
        $this->book->year_published = $request->year_published;
        $this->book->author_id = $request->author_id;
        $this->book->cover_photo = $this->savePhoto($request);
        $this->book->save();

        return redirect()->back();

    }

    public function savePhoto($request) {
        $photo_name = "";
        if($request->cover_photo){
            // Change the name of the image to the CURRENT TIME to avoid overwriting.
            $photo_name = time() . "." . $request->cover_photo->extension();
            // Store the image inside storage/app/public/photos/
            $request->cover_photo->storeAs(self::LOCAL_STORAGE_FOLDER, $photo_name);
        }

        return $photo_name;
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $book = $this->book->findOrFail($id);
        return view('books.show')->with('book',$book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $all_authors = Author::all();
        $book = $this->book->findOrFail($id);
        return view('books.edit')->with('book', $book)->with('all_authors', $all_authors);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:50',
            'year_published' => 'required|max:4',
            'author_id' => '',
            'cover_photo' => 'mimes:jpeg,jpg,png,gif|max:1048'
        ]);

        $all_author = Author::all();
        $book = $this->book->findOrFail($id);
        $book->title = $request->title;
        $book->year_published = $request->year_published;
        $book->author_id = $request->author_id;
        $book->cover_photo = "";

        if ($request->cover_photo)
        {
            // Delete the previous cover_photo
            $this->deletePhoto($book->cover_photo);

            // Move the cover_photo to public storage
            $book->cover_photo = $this->savePhoto($request);
            // $book->image = '1632342342.jpg';
        }

        $book->save();
        return redirect()->route('book.show', $id)->with('all_author',$all_author);


    }

    public function deletePhoto($image_name) {
        $image_path = self::LOCAL_STORAGE_FOLDER . $image_name;
        // $image_path = "/public/images/1632278.jpeg";

        // Checking fi the image exists then delete it
        if (Storage::disk('public')->exists($image_path)) {
            Storage::disk('public')->delete($image_path);
        }
    }

    //public function delete($id){
    //    $book = $this->book->findOrFail($id);
    //    return view('books.delete')->with('id', $id)->with('book', $book);
    //}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      
        $book = $this->book->findOrFail($id);
        $this->deletePhoto($book->cover_photo);
        $book->delete();

        return redirect()->route('book.index');
    }

}
