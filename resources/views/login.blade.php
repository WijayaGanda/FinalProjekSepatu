@extends('layouts.app')
@section('content')
{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    @vite('resources/sass/app.scss')
</head> --}}

<body>
    <div class="container-sm my-5">
        <form action="" method="" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="container-sm mt-5">
                    <form action="" method="">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="p-5 bg-light rounded-3 border col-xl-6">
                                <div class="mb-3 text-center">
                                    <i class="bi-person-circle fs-1"></i>
                                    <h4>Login Employee</h4>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="username" class="form-label"> Username</label>
                                        <input class="form-control @error('username') is-invalid @enderror"
                                            type="text" name="username" id="username" value=""
                                            placeholder="Enter Username">
                                        @error('username')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="pass" class="form-label"> Password</label>
                                        <input class="form-control @error('pass') is-invalid @enderror"
                                            type="text" name="pass" id="pass" value=""
                                            placeholder="Enter Password Correctly">
                                        @error('pass')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>


                                    <hr>
                                    <div class="col-md-6 d-grid">
                                        <button type="submit" class="btn btn-dark btn-lg mt-3"><i
                                                class="bi-check-circle me-2"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</body>

</html>
@endsection
