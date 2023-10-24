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
                                @foreach ($data->projectmembers as $projectmembers)
                                    <li>{{ $projectmembers }}</li>
                                @endforeach
                            </ol>
                        </td>
                        <td>{{ $data->gradelevel }}. {{ $data->class }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('projectshow/' . $data->id) }}">View</a>
                            @if (Route::has('login'))
                                @auth
                                    <form action="{{ url('projectupdate/' . $data->id) }}" class="btn p-0">
                                        <button type="submit" class="btn btn-success">Edit</button>
                                    </form>
                                    <form action="{{ url('projectdelete/' . $data->id) }}" class="btn p-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endauth
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection

