@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card border-dark mb-3">
            <h3 class="card-header">Project</h3>
            <div class="card-body">
                <h5 class="card-title">{{ $project->projectname }}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>

                <iframe width="560" height="315" src="{{ $project->video }}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen class="d-flex justify-content-center"></iframe>
            </div>
        </div>
    </div>
@endsection
