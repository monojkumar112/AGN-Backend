<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Achia || Reset Password</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('css')
    <style>
        body{
            background: #d8d8d8;
        }
        .card-wrap{
          display: flex;
          justify-content: center;
          align-items: center;
          width: 100%;
          height: 100vh;
        }
        .card{
            width: 400px;
        }
        .logo{
            padding: 30px 0px 15px 0px;
        }
        .logo img{
            height: 20px;
        }
        .form-control:focus {
            border-color: #FF0094;
            box-shadow: none;
        }
        .reset{
            font-family: 'Great Vibes', cursive;
            margin-bottom: 0px;
            color: #FF0094;
        }
        .btn-reset{
            font-family: 'Great Vibes', cursive;
            background: #FF0094;
            color: white;
            padding: 7px 25px;
        }
        .btn-reset:hover{
            background: #FF0094;
            color: white;
        }
        .forgot, .register, a{
            font-weight: bold;
            color: #FF0094;
        }
        .forgot, .register, a:hover{
            font-weight: bold;
            color: #FF0094;
        }
        @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');
    </style>
</head>
<body>
    <div class="card-wrap">
        <div class="card">
            <div class="logo text-center">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('assets/frontend/img/logo/logo-achia-nila.png') }}" alt="logo-pic" class="img-fluid">
                </a>
            </div>
            <div class="heading text-center">
                <h2 class="reset">Reset</h2>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-reset">
                            Password Reset Link
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>