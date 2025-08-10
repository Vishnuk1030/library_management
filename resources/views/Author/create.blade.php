@extends('app')

@section('content')
@include('inc.flashmsg')


<div class="container mt-2">
    <form action="{{route('author.store')}}" method="post">
        @csrf

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Author Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                placeholder="Enter your name">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Author Email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                placeholder="Enter your email">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
