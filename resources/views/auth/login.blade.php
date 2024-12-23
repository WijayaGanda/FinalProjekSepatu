<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/sass/app.scss')
</head>

<body class="d-flex justify-content-center align-items-center min-vh-100" style="background:linear-gradient(to bottom, #000000, #6D5380);">
    @vite('resources/js/app.js')
    @include('sweetalert::alert')
    @stack('scripts')
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container-sm d-flex justify-content-center my-5">
                    <div class="card" style="width: 30rem;">

                        <div class="mt-3 text-center" style="font-size: 30px; font-weight: bold; font-size:23pt"><i
                                class="bi-person-circle fs-1"></i>
                            <br>{{ __('Login') }}
                        </div>
                        <div class="card-body">
                            <hr>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3 ">
                                    <label for="username"
                                        class="col-md-3 col-form-label text-md-end">{{ __('') }} <i
                                            class="bi bi-person-lines-fill h3"></i></label>



                                    <div class="col-md-6 mb-3">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        {{-- <input id="usernamel" type="username"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" required autocomplete="username" autofocus
                                            placeholder="Enter Username">

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-3 col-form-label text-md-end">{{ __('') }}<i
                                            class="bi bi-key-fill h3"></i></label>

                                    <div class="col-md-6 d-grid">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password"
                                            placeholder="Enter Password Correctly">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="row justify-content-center">
                                    <div class="col-md-6 d-grid">
                                        <button type="submit" class="btn btn-dark btn-lg mt-3"><i
                                                class="bi bi-arrow-right-circle-fill"></i>
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>
                        </div>
                        </form>
                        <div class="text-center mt-3">
                            <p>Forgot Password ?  <a href="{{ route('password.reset.direct') }}">Reset disini</a></p>
                        </div>
                        <div class="text-center mt-3">
                            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
