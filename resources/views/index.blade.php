@extends('layouts.app')

@section('content')

<style>
        .fact-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-family: 'Arial', sans-serif;
            max-width: 600px;
            margin: 0 auto;
        }
        .fact-title {
            font-family: 'Pacifico', cursive;
            font-size: 2em;
            color: #FF6F61;
        }
        .fact-text {
            font-size: 1.2em;
            color: #555;
            margin-top: 10px;
        }
    </style>

<div class="container">
    <div class="row justify-content-center text-center">
        <h1>Welcome to Library</h1>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-layer-group fa-3x text-success mb-3"></i>
                    <h3 class="card-title">Authors({{$author_count}})</h3>
                    <p class="card-text">Discover different sections of our minimart catalog.</p>
                    <a href="{{route('author.index')}}" class="btn btn-success">View Authors</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-box fa-3x text-primary mb-3"></i>
                    <h3 class="card-title">Books({{$book_count}})</h3>
                    <p class="card-text">Explore a variety of products available in our catalog.</p>
                    <a href="{{route('book.index')}}" class="btn btn-primary">View Books</a>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-3">
        <div class="fact-card">
            <h2 class="fact-title">Cat Fact<i class="fas fa-cat"></i></h2>
            <p class="fact-text">{{ $cat['fact']}}</p>
            <a href="/" class="btn btn-outline-primary mt-3">Show Another Fact</a>
        </div>
    </div>

</div>
@endsection
