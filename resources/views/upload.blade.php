<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <form method="post" action="{{ route('fileupload') }}" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-md-cente mb-3">
                <div class="col">
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="firstname">
                    @error('firstname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                    <label for="">Lastname</label>
                    <input class="form-control" type="text" name="lastname">
                    @error('lastname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            {{-- <div class="row justify-content-md-cente">
                <div class="col">
                    <label for="">Portrait</label>
                    <input class="form-control" type="file" name="portrait">
                </div>
            </div> --}}
            <button class="btn btn-danger" type="submit">Submit Form</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
