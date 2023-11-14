@extends('layouts.main')
@section('content')
    <div class="container mb-5">
        <div class="card">
            <h4 class="card-header bg-dark text-light p-3">Project Upload</h4>
            <div class="card-body p-4">
                <form method="POST" action="{{url("projectupdate/". $project->id )}}" enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <div class="row g-3 mb-3 fs-5">
                        <div class="col-6">
                            <label for="">ชื่อโครงงาน</label>
                            <input class="form-control border border-dark" type="text" name="projectname"
                                value="{{ $project->projectname }}">
                            @error('projectname')
                                <span class="text-danger fs-6">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-2">
                            <label for="">ปีการศึกษา</label>
                            <input class="form-control border border-dark" type="number" name="academicyear"
                                value="{{ $project->academicyear }}">
                            @error('academicyear')
                                <span class="text-danger fs-6">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-2">
                            <label for="">ระดับ</label>
                            <select class="form-select border border-dark" aria-label="Default select example"
                                name="gradelevel">
                                <option selected disabled>เลือกระดับชั้น</option>
                                <option value="{{ $project->gradelevel }}" selected>{{ $project->gradelevel }}</option>
                                <option value="ปวช">ปวช</option>
                                <option value="ปวส">ปวส</option>
                            </select>
                            @error('gradelevel')
                                <span class="text-danger fs-6">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-2">
                            <label for="">ห้อง</label>
                            <input class="form-control border border-dark" type="text" name="class"
                                value="{{ $project->class }}">
                            @error('class')
                                <span class="text-danger fs-6">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="">คำอธิบายโครงงาน</label>
                            <textarea class="form-control border border-dark" name="description" cols="30" rows="10">{{ $project->description }}</textarea>
                            @error('description')
                                <span class="text-danger fs-6">{{ $message }}</span>
                            @enderror
                        </div>
                        <fieldset>
                            <div class="col" id="memberCol">
                                <label for="">ผู้รับผิดชอบโครงงาน</label>
                                @foreach ($project->projectmembers as $items)
                                    <input class="form-control border border-dark mt-3" type="text"
                                        name="projectmembers[]" value="{{ $items }}">
                                @endforeach
                                @error('projectmembers')
                                    <span class="text-danger fs-6">{{ $message }}</span>
                                @enderror
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="col" id="advisorCol">
                                <label for="">อาจารย์ที่ปรึกษาโครงงาน</label>
                                @foreach ($project->projectadvisors as $items)
                                    <input class="form-control border border-dark mt-3" type="text"
                                        name="projectadvisors[]" value="{{ $items }}">
                                @endforeach
                                @error('projectadvisors')
                                    <span class="text-danger fs-6">{{ $message }}</span>
                                @enderror
                            </div>
                        </fieldset>
                        <div class="col-12">
                            <label for="">Embed Youtube</label>
                            <input class="form-control border border-dark" type="text" name="video"
                                value="{{ $project->video }}">
                            @error('video')
                                <span class="text-danger fs-6">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="">รูปเล่มโครงงาน</label>
                            <input class="form-control border border-dark" type="file" name="abstract">
                            @error('abstract')
                                <span class="text-danger fs-6">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="">Source Code</label>
                            <input class="form-control border border-dark" type="file" name="code">
                            @error('code')
                                <span class="text-danger fs-6">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="">ใบลายเซ็น</label>
                            <input class="form-control border border-dark" type="file" name="approval">
                            @error('approval')
                                <span class="text-danger fs-6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="row justify-content-md-cente">
                        <div class="col">
                            <label for="">Portrait</label>
                            <input class="form-control" type="file" name="portrait">
                        </div>
                    </div> --}}
                    <div class="d-flex flex-row-reverse">
                        <button class="btn btn-success" type="submit">Submit Form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
