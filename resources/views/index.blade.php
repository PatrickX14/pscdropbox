@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="px-4 py-5 my-5 text-center">
            <img class="d-block mx-auto mb-4" src="{{ asset('img/psclogo.png') }}" alt="" width="200px">
            <h1 class="display-5 fw-bold text-body-emphasis">PSC Dropbox</h1>
            <div class="col-lg-6 mx-auto">
                {{-- <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                    most
                    popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
                    extensive prebuilt components, and powerful JavaScript plugins.</p> --}}
                {{-- <div class="d-grid gap-2 d-sm-flex justify-content-center">
                    <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="container">
        <hr class="divider">
    </div>

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
                                    {{-- <form method="POST" action="{{ url('projectedit/' . $data->id) }}" class="btn p-0">
                                        <button type="submit" class="btn btn-success">Edit</button>
                                    </form> --}}
                                    <a href="{{ url('projectedit/' . $data->id) }}" class="btn btn-success">Edit</a>
                                    <form method="POST" action="{{ url('projectdelete/' . $data->id) }}" class="btn p-0">
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
    </div>
@endsection
