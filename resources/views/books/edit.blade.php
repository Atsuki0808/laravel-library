@extends('layouts.app')

@section('title','Home')

@section('content')
<div class="container mt-5 text-center">       
        <div class="text-center">
        <h3 class="text-start">Edit books</h3>
            <div class="mx-auto row">
                <div class="col-3">
                <img src="{{asset('/storage/image/'. $book->cover_photo)}}" alt="{{ $book->cover_photo}}" class="w-100 shadow rounded">
                </div>
                <div class="col-7">
                    <form action="{{ route('book.update',$book->id) }}" method="POST" class="input-group mb-3" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row w-100">
                            <div class="col-12">
                            <label for="title" class="form-label">title</label>
                            <input type="text" name="title" class="form-control" value="{{$book->title}}" placeholder="Add new book here..." required>
                            </div>
                        </div>
    
                        <div class="row w-100 mt-3">
                            <div class="col-6">
                                <label for="year" class="form-label">year published</label>
                                <input type="text" name="year_published" value="{{$book->year_published}}" class="form-control" placeholder="Add new book here..." required>
                            </div>
                            <div class="col-6">
                                <label for="author" class="form-label">Author</label>
                                <select name="author_id" id="section" class="form-select" required>
                                     <option value="" selected>Anonimus</option>
                                     @foreach($all_authors as $author)
                                         <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }} >{{ $author->name }}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>
    
                        <div class="row w-100 mt-3">
                            <div class="col-12">
                                <label for="image" class="form-label text-secondary">Image</label>
                                <input type="file" name="cover_photo" id="image" class="form-control" aria-describedby="image-info">
                                <div class="form-text" id="image-info">
                                Acceptable formats jpeg, jpg ,png ,gif only.<br>
                                Maximum file size is 1048kB
                                </div>
                            </div>

                        </div>      
                        <div class="row w-100 mt-3">  
                            <div class="col-6 my-auto">
                                <a class="btn btn-warning form-control" href="{{route('book.show',$book->id)}}">cancel</a>
                            </div>
                            <div class="col-6 my-auto">
                                <button class="btn btn-warning form-control" type="submit">update</button>
                            </div>

                        </div>            
                    </form>
                </div>
 
            </div>
        </div>
    </div>


@endsection
