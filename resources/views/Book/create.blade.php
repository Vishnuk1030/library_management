@extends('app')

@section('content')

@include('inc.flashmsg')
<div class="container mt-2">
    <form action="{{route('book.store')}}" method="post">
        @csrf

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Author Id</label>
            <input type="number" name="author_id" class="form-control" id="exampleFormControlInput1"
                placeholder="Enter your author id">
            @error('author_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Book Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                placeholder="Enter your bookk Title">
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Book description</label>
            <input type="text" name="description" class="form-control" id="exampleFormControlInput1"
                placeholder="Enter your book description">
            @error('description')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
