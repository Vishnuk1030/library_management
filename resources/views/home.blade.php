@extends('app')

@section('content')

<div class="container mt-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Manage Books</div>
            <div class="card-body">

                <form method="GET" action="{{ route('index') }}" class="mb-3">
                    @csrf
                    <div class="row gap-1">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control"
                                placeholder="Search title, author, description..." value="{{ request('search') }}">
                        </div>
                        <div class="col-md-3">
                            <select name="author_name" class="form-control">
                                <option value="">-- Filter by Author --</option>
                                @foreach($authors as $author)
                                <option value="{{ $author }}" {{ request('author_name')==$author ? 'selected' : '' }}>
                                    {{ $author }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 gap-1 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a href="{{ route('index') }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Sl.No</th>
                                <th scope="col">Book Title</th>
                                <th scope="col">Book Description</th>
                                <th scope="col">Author</th>
                                <th scope="col">Author Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datas as $index => $data)
                            <tr>
                                <th scope="row">{{ $datas->firstItem() + $index }}</th>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->description }}</td>
                                <td>{{ $data->author_name }}</td>
                                <td>{{ $data->author_email }}</td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="5" class="text-center">No data found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $datas->withQueryString()->links() }}

            </div>
        </div>
    </div>
</div>

@endsection
