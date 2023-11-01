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
                <h4>Project Name</h4>
                <p>Desricption</p>
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
            </div>
        </div>
    </div>
@endsection
