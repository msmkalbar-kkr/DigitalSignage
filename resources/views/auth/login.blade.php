<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIMPD - Login</title>
    <link rel="icon" href="{{ asset('template/login/img/icon.png') }}" type="image/gif" sizes="16x16">
    <link rel="icon" href="{{ asset('template/login/img/icon.png') }}" type="image/gif" sizes="18x18">
    <link rel="icon" href="{{ asset('template/login/img/icon.png') }}" type="image/gif" sizes="20x20">
    <!-- CSS only -->
    <link rel="stylesheet" href="{{ asset('template/login/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/login/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('template/login/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('template/login/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('template/login/style.css') }}">
</head>

<body>



    <main class="bforum-main">
        <div class="container">
            <div class="row min-vh-100">
                <div class="col-lg-6 align-self-center">
                    <div class="login-page-left text-center">
                        <div class="image mt-50">
                            <img src="{{ asset('template/login/img/Login.svg') }}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="login-register-section">
                        <div class="logo mb-4 text-center">
                            <img src="{{ asset('template/dist/assets/images/logo/LOGO KOPER DINAS OK.png') }}" alt="Logo"height="150px">
                        </div>
                        <form action="{{ route('login.store') }}" method="POST">
                            @csrf
                            <div class="single-input">
                                <label for="email">Username *</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" placeholder="Username" autofocus
                                    value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="single-input">
                                <label for="password">Password *</label>
                                {{-- <input type="password" id="password" name="password" placeholder="Password"> --}}
                                <div class="input-group mb-3">
                                    <input name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password"
                                        placeholder="password" />
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="password_show_hide();">
                                            <i class="fa fa-eye" id="show_eye"></i>
                                            <i class="fa fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="button-1">Sign In</button>
                        </form>
                        @if (\Session::has('error'))
                            <div class="alert alert-danger mt-4">
                                {!! \Session::get('error') !!}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- JS -->
    <script src="{{ asset('template/login/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('template/login/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/login/js/nice-select.js') }}"></script>
    <script src="{{ asset('template/login/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('template/login/js/main.js') }}"></script>

    <script>
        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
    </script>
</body>

</html>
