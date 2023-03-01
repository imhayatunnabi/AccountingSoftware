<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ settings()->name }}</title>
    <link rel="shortcut icon" href="{{url('/image/favicon.svg')}}">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="{{url('/image/favicon.svg')}}">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="{{url('/image/favicon.svg')}}">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="{{url('/image/favicon.svg')}}">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="{{url('/image/favicon.svg')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #e7e9f2;
            min-height: 100vh;
        }

        @media (max-width: 767px) {
            body {
                padding-top: 16px;
                padding-bottom: 16px;
            }
        }

        .login-card {
            width: 441px;
            border-radius: 8px;
            border: 0;
            background-color: #fff;
        }

        @media (max-width: 767px) {
            .login-card {
                width: auto;
            }
        }

        .login-card .card-body {
            padding: 55px 55px 50px;
        }

        .login-card-title {
            font-size: 25px;
            text-align: center;
            font-weight: bold;
            color: #000;
            margin-bottom: 13px;
        }

        .login-card-description {
            font-size: 20px;
            color: #000;
            text-align: center;
            font-weight: normal;
            margin-bottom: 20px;
        }

        .login-card .form-control {
            border: 1px solid #f5f5f5;
            padding: 16px 18px;
            margin-bottom: 18px;
            border-radius: 0;
            min-height: 48px;
            font-size: 14px;
            font-weight: normal;
        }

        .login-card .form-control::-webkit-input-placeholder {
            color: #b0adad;
        }

        .login-card .form-control::-moz-placeholder {
            color: #b0adad;
        }

        .login-card .form-control:-ms-input-placeholder {
            color: #b0adad;
        }

        .login-card .form-control::-ms-input-placeholder {
            color: #b0adad;
        }

        .login-card .form-control::placeholder {
            color: #b0adad;
        }

        .login-card-check-box {
            padding-left: 34px;
        }

        @media (max-width: 767px) {
            .login-card-check-box {
                margin-bottom: 10px;
            }
        }

        .login-card-check-box .custom-control-label::before {
            width: 24px;
            height: 21px;
            border: solid 1px #f5f5f5;
            left: -34px;
            top: 0px;
        }

        .login-card-check-box .custom-control-label::after {
            left: -34px;
            width: 24px;
            height: 21px;
            top: 0;
        }

        .login-card .login-btn {
            padding: 13px 20px;
            background-color: #000;
            border-radius: 0;
            font-size: 20px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 36px;
        }

        .login-card .login-btn:hover {
            border: 1px solid #000;
            background-color: #fff;
            color: #000;
        }

        .login-card-footer-text {
            font-size: 13px;
            color: #000;
            text-align: center;
            margin-bottom: 0;
        }

        .form-options-wrapper {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: normal;
            color: #000;
        }

        @media (max-width: 767px) {
            .form-options-wrapper {
                display: block;
            }
        }

        .footer-content-wrapper {
            display: -webkit-box;
            display: flex;
            -webkit-box-pack: justify;
            justify-content: space-between;
            color: #919aa3;
            padding-top: 45px;
            padding-bottom: 45px;
        }

        @media (max-width: 576px) {
            .footer-content-wrapper {
                display: block;
                text-align: center;
            }
        }

        .footer-content-wrapper a {
            color: inherit;
            -webkit-transition: color 0.3s ease;
            transition: color 0.3s ease;
        }

        .footer-content-wrapper a:hover {
            text-decoration: none;
            color: #000;
        }
    </style>
</head>

<body class="d-flex flex-column" style="background-image: url({{ url('backend/image/auth/background.jpg') }});background-size: cover;
background-repeat: no-repeat;
background-position: center center;
">
    <main class="m-auto">
        <div class="container-fluid">
            <div class="card login-card">
                <div class="card-body">
                    <h2 class="login-card-title">{{ settings()->name }}</h2>
                    <p class="login-card-description">Sign into your account</p>
                    <form action="{{route('backend.auth.login.submit')}}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label class="sr-only">Username/Email/Phone</label>
                            <input type="text" required name="input" class="form-control" placeholder="username"
                                autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label class="sr-only">Password</label>
                            <input type="password" required name="password" id="password" class="form-control"
                                placeholder="Password" autocomplete="off">
                        </div>
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In
                        </button>
                    </form>
                </div>
                <div class="card mx-auto border-0">
                    <p>Username: super_admin</p>
                    <p>Email: super-admin@neuralwebx.com
                    </p>
                    <p>Password: 123456</p>
                </div>
            </div>

        </div>
    </main>
    <footer>
        <div class="container">
            <div class="footer-content-wrapper">
                <p class="mb-sm-0">Copyright 2022 Clinic x <span class="text-primary">Hayatunnabi Nabil</span> </p>
                <nav>
                    <a href="#">Terms of use.</a>
                    <a href="#">Privacy policy</a>
                </nav>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>

</html>
