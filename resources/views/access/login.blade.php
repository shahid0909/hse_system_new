@extends('access.layouts.auth')
@section('title', 'Sign-in')
@section('content')
    <div class="main p-2 py-3 p-xl-5 ">

        <!-- Body: Body -->
        <div class="body d-flex p-0 p-xl-5">
            <div class="container-xxl">

                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                        <div style="max-width: 25rem;">
                            <div class="text-center mb-5">
                                <i class="bi bi-bag-check-fill  text-primary" style="font-size: 90px;"></i>
                            </div>
                            <div class="mb-5">
                                <h2 class="color-900 text-center">A few clicks is all it takes.</h2>
                            </div>
                            <!-- Image block -->
                            <div class="">
                                <img src="../assets/images/login-img.svg" alt="login-img">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                        <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">
                            <!-- Form -->
                            <form class="row g-1 p-3 p-md-4" action="{{ route('login') }}">
                                <div class="col-12 text-center mb-5">
                                    <h1>Sign in</h1>
                                    <span>Free access to our dashboard.</span>
                                </div>
                                <div class="col-12 text-center mb-4">
                                    <a class="btn btn-lg btn-light btn-block" href="#">
                                            <span class="d-flex justify-content-center align-items-center">
                                                <img class="avatar xs me-2" src="../assets/images/google.svg" alt="Image Description">
                                                Sign in with Google
                                            </span>
                                    </a>
                                    <span class="dividers text-muted mt-4">OR</span>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">{{ __('Email Address') }}</label>
                                        <input type="email"
                                               class="form-control form-control-lg @error('email') is-invalid @enderror"
                                               placeholder="name@example.com"
                                               name="email" value="{{ old('email') }}" required autocomplete="off" autofocus
                                        >
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <div class="form-label">
                                                <span class="d-flex justify-content-between align-items-center">
                                                    {{ __('Password') }}
                                                    @if (Route::has('password.request'))
                                                        <a class="text-secondary" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                                    @endif
                                                </span>
{{--                                            auth-password-reset.html--}}
                                        </div>
                                        <input type="password"
                                               class="form-control form-control-lg @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="off"
                                               placeholder="***************">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase" atl="signin">{{ __('SIGN IN') }}</button>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <span>Don't have an account yet? <a href="auth-signup.html" class="text-secondary">Sign up here</a></span>
                                </div>
                            </form>
                            <!-- End Form -->

                        </div>
                    </div>
                </div> <!-- End Row -->

            </div>
        </div>

    </div>
@endsection
