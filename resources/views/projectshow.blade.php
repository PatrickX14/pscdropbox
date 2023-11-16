@extends('layouts.main')
@section('content')
    <div class="container mb-5">
        <div class="card">
            <div class="card-title border-bottom bg-dark">
                <h4 class="ps-4 pt-2 pb-1 pe-4 text-light">Test</h4>
            </div>
            <div class="card-body">
                {{-- <img src="{{ asset('img/psclogo.jpg') }}" class="card-img-top mx-auto d-block" style="max-width: 350px;"> --}}
                <iframe class="mb-4 mx-auto d-block" width="560" height="315"
                    src="https://www.youtube.com/embed/7k12n9iexkY?si=w6TZKBkzpHFmtbCM" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
                <hr>
                <h4>{{ $project->projectname }}</h4>
                <p>{{ $project->description }}</p>
                <div class="row mx-auto text-center">
                    <div class="col">
                        <a class="btn btn-secondary pt-3 pb-3 ps-4 pe-4" href="{{ asset("storage/approval/$project->approval")}}" download>ใบลายเซ็น</a>
                    </div>
                    <div class="col">
                        <a class="btn btn-secondary pt-3 pb-3 ps-4 pe-4" href="{{ asset("storage/abstract/$project->abstract")}}" download>รูปเล่มโครงงาน</a>
                    </div>
                    <div class="col">
                        <a class="btn btn-secondary pt-3 pb-3 ps-4 pe-4" href="{{ asset("storage/code/$project->code")}}" download>Source Code</a>
                    </div>
                </div>
                <div class="row mx-auto text-center mt-5">
                    <div class="col">
                        <h3>ผู้รับผิดชอบโครงงาน</h3>
                        @foreach ($project->projectmembers as $members)
                            <p>{{ $members }}</p>
                        @endforeach
                    </div>
                    <div class="col">
                        <h3>อาจารย์ที่ปรึกษา</h3>
                        @foreach ($project->projectadvisors as $advisors)
                            <p>{{ $advisors }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

