@extends('layouts.main')
@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Project Members</th>
                    <th scope="col">Class</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($projectdata as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->projectname }}</td>
                        <td>
                            <ol>
                                <li>test</li>
                            </ol>
                        </td>
                        <td>{{ $data->gradelevel }}. {{ $data->class }}</td>
                        <td>
                            <button class="btn btn-primary">View</button>
                            @if (Route::has('login'))
                                @auth
                                    <button class="btn btn-success">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                @endauth
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
