@extends('layouts.app')

@section('title','Home')

@section('content')
<div class="container mt-5 text-center">
        <h3 class="text-center">books</h3>
        <div class="text-center">
            <div class="mx-auto">
                <form action="{{ route('book.store') }}" method="POST" class="input-group mb-3" enctype="multipart/form-data">
                    @csrf
                    <div class="row w-100">
                        <div class="col-12">
                        <label for="title" class="form-label">title</label>
                        <input type="text" name="title" class="form-control" placeholder="Add new book here..." required>
                        </div>
                    </div>

                    <div class="row w-100 mt-3">
                        <div class="col-6">
                            <label for="year" class="form-label">year published</label>
                            <input type="text" name="year_published" class="form-control" placeholder="Add new book here..." required>
                        </div>
                        <div class="col-6">
                            <label for="author" class="form-label">Author</label>
                            <select name="author_id" id="section" class="form-select" required>
                                 <option selected disabled>Select Authors</option>
                                 <option value="">Anonimus</option>
                                 @foreach($all_authors as $author)
                                     <option value="{{ $author->id }}">{{ $author->name }}</option>
                                 @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row w-100 mt-3">
                        <div class="col-6">
                            <label for="image" class="form-label text-secondary">Image</label>
                            <input type="file" name="cover_photo" id="image" class="form-control" aria-describedby="image-info">
                            <div class="form-text" id="image-info">
                            Acceptable formats jpeg, jpg ,png ,gif only.<br>
                            Maximum file size is 1048kB
                            </div>
                        </div>
                        <div class="col-6 my-auto">
                            <button class="btn btn-success form-control" type="submit">+ Add</button>
                        </div>
                    </div>


                        



                    
                    
                </form>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_books as $book)
                        <tr>
                            <td><a href="{{route('book.show', $book->id)}}">{{ $book->title }}</a></td>
                            <td>
                            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-sm btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i> 
                            </a>
                                <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-book-{{ $book->id }}"><i class="fa-solid fa-trash-can"></i>Delete</button>
                            </td>
                        </tr>
                        @include('books.modal.delete')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
