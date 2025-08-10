@extends('app')

@section('content')

<div class="container mt-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Manage</div>
            <div class="card-body">
                <div class="table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">sl.No</th>
                                <th scope="col">Book Title</th>
                                <th scope="col">Book decription</th>
                                <th scope="col">Author</th>
                                <th scope="col">Author Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
