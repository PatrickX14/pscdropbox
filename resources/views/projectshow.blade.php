@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-title border-bottom bg-dark">
                <h4 class="ps-4 pt-2 pb-1 pe-4 text-light">Test</h4>
            </div>
            <div class="card-body">
                <img src="{{ asset('img/psclogo.jpg') }}" class="card-img-top mx-auto d-block" style="max-width: 350px;">
                <hr>
                <h4>{{ $project->projectname }}</h4>
                <p>{{ $project->description }}</p>
                <div class="row mx-auto text-center">
                    <div class="col">
                        <a class="btn btn-secondary pt-3 pb-3 ps-4 pe-4" href="">ใบลายเซ็น</a>
                    </div>
                    <div class="col">
                        <a class="btn btn-secondary pt-3 pb-3 ps-4 pe-4" href="">รูปเล่มโครงงาน</a>
                    </div>
                    <div class="col">
                        <a class="btn btn-secondary pt-3 pb-3 ps-4 pe-4" href="">Source Code</a>
                    </div>
                </div>
                <iframe class="mt-5 mx-auto d-block" width="560" height="315"
                    src="https://www.youtube.com/embed/7k12n9iexkY?si=w6TZKBkzpHFmtbCM" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
                <div class="row mx-auto text-center mt-5">
                    <div class="col">
                        @foreach ($project->projectmembers as $members)
                            <p>{{ $members }}</p>
                        @endforeach
                    </div>
                    <div class="col">
                        @foreach ($project->projectadvisors as $advisors)
                            <p>{{ $advisors }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
