<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="adminpopular" />
    <!-- DESCRIPTION -->
    <meta name="description" content="AdminPopular : Bootstrap 4 Responsive Admnin Template" />
    <!-- FAVICONS ICON ============================================= -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/frontend/img/SFOLogo.png')}}" />
    <!-- PAGE TITLE HERE ============================================= -->
    <title>Login - {{ config('app.name', 'SFO') }}</title>
    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- All PLUGINS CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/assets.css')}}">
    <!-- MAIN STYLE ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/dashboard.css')}}">
</head>

<body>
    <!-- <div class="loader"></div> -->
    <!-- header start -->
    <section class="login-content">
        <div class="login-box">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
                <div class="mb-3">
                    <label class="control-label" for="username">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="control-label" for="password">Password</label>
                    <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" placeholder="Password" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <label>
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><span class="label-text">Remember Me</span>
                            </label>
                        </div>
                        <!-- <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p> -->
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block w-100"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN
                        IN</button>
                </div>
            </form>
        </div>
    </section>

</body>
</html>