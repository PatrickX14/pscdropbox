<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <div class="container">
                        <a href="{{ route('project.upload') }}" class="btn btn-primary mb-3">เพิ่มโครงงาน</a>
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
                                @foreach ($projects as $data)
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
                                            <a class="btn btn-primary" href="{{ url('projectshow/' . $data->id) }}"
                                                style="background-color: #0d6efd;">View</a>
                                            @if (Route::has('login'))
                                                @auth
                                                    {{-- <form method="POST" action="{{ url('projectedit/' . $data->id) }}" class="btn p-0">
                                                        <button type="submit" class="btn btn-success">Edit</button>
                                                    </form> --}}
                                                    <a href="{{ url('projectedit/' . $data->id) }}"
                                                        class="btn btn-success">Edit</a>
                                                    <form method="POST" action="{{ url('projectdelete/' . $data->id) }}"
                                                        class="btn p-0">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
