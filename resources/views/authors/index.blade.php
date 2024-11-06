@extends('layouts.app')

@section('title','Home')

@section('content')
<div class="container mt-5 text-center">
        <h3 class="text-center">Authors</h3>
        <div class="row text-center">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('author.store') }}" method="POST" class="input-group mb-3">
                    @csrf
                    <input type="text" name="name" class="form-control" placeholder="Add new author here..." required>
                    <button class="btn btn-success" type="submit">+ Add</button>
                </form>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_authors as $author)
                        <tr>
                            <td>{{ $author->name }}</td>
                            <td>
                            <a href="{{ route('author.edit', $author->id) }}" class="btn btn-sm btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i> 
                            </a>
                                <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-author-{{ $author->id }}"><i class="fa-solid fa-trash-can"></i>Delete</button>
                            </td>
                        </tr>
                        @include('authors.modal.delete')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
