<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Book;
use App\Models\Author;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $author_count = Author::count();
        $book_count = Book::count();

        //access cat fact api
        $response = Http::get('https://catfact.ninja/fact');
        $cat = $response->json();

        return view('index')->with('cat',$cat)->with('author_count',$author_count)->with('book_count', $book_count);
    }
}
