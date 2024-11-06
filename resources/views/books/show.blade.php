@extends('layouts.app')

@section('title','Home')

@section('content')
<div class="container mt-5 text-center">
    <div class="card w-75 mx-auto">
        <div class="card-header">
            <h2 class="d-inline">Book Preview</h2>
            <div class="float-end d-inline">
                <a href="{{route('book.index')}}" class="btn bg-warning d-inline">Back</a>
                <a href="{{route('book.edit',$book->id)}}" class="btn bg-warning">Edit</a>
            </div>

        </div>
        <div class="card-body">
            <div class="row text-center">
                <div class="col-3">
                    <img src="{{asset('/storage/image/'. $book->cover_photo)}}" alt="{{ $book->cover_photo}}" class="w-100 shadow rounded">
                </div>
                <div class="col-9">
                    <p class="h2">{{$book->title}}</p>
                    @php
                    if(isset($book->author->name) && $book->author->name != ""){
                        $author_name = $book->author->name;
                    }else{
                        $author_name = "Anonimus";
                    }
                    @endphp
                    <p class="h3">by {{$author_name}}</p>
                    <p class="h3">published in {{$book->year_published}}</p>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection
