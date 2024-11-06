@extends('layouts.app')

@section('title','Edit')

@section('content')

<div class="container mt-5 mx-auto">
    <div class="col-8 mx-auto">
        <h3>Edit author</h3>
        <form action="{{ route('author.update',$author->id) }}" method="POST">
            @csrf
            @method('PATCH')
    
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value= "{{ old('title', $author->name) }}" class="form-control" required>
            </div>
    
            <div class="d-flex justify-content-between">
                <a href="{{ route('author.index') }}" class="btn form-control btn-outline-secondary mx-3">Cancel</a>
                <button type="submit" class="btn form-control btn-warning mx-3">update</button>
            </div>
        </form>
    </div>

</div>


@endsection
