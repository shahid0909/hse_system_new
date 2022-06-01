@extends('layouts.app')
@section('content')
    <div class="main p-2 py-3 p-xl-5">

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
                        <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;height: 44rem;">
                            <div class="col-12 text-center">
                                <h2>Create your account</h2>
                                <span>Free access to our dashboard.</span>
                            </div>
                            <!-- Form -->
                            <form class="row g-1 p-3 p-md-4" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">{{ __('Name') }}</label>
                                        <input type="text"
                                               class="form-control form-control-lg @error('name') is-invalid @enderror"
                                               placeholder="John"
                                               id="name"
                                               name="name" value="{{ old('name') }}" required autocomplete="off" autofocus
                                        >
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">{{ __('Email Address') }}</label>
                                        <input type="email"
                                               id="email"
                                               class="form-control form-control-lg @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required autocomplete="off"
                                               placeholder="name@example.com">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="password">{{ __('Password') }}</label>
                                        <input type="password"
                                               id="password"
                                               class="form-control form-control-lg @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="off"
                                               placeholder="8+ characters required">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">{{ __('Confirm Password') }}</label>
                                        <input type="password"
                                               id="password-confirm"
                                               class="form-control form-control-lg"
                                               name="password_confirmation" required autocomplete="off"
                                               placeholder="8+ characters required">
                                    </div>
                                </div>
{{--                                <div class="col-12">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">--}}
{{--                                        <label class="form-check-label" for="flexCheckDefault">--}}
{{--                                            I accept the <a href="#" title="Terms and Conditions" class="text-secondary">Terms and Conditions</a>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-12 text-center mt-4">
                                    <button type="submit"
                                       class="btn btn-lg btn-block btn-light lift text-uppercase btn-primary">{{ __('SIGN UP') }}</button>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <span>Already have an account? <a href="{{ route('login') }}" title="Sign in" class="text-secondary">{{ __('Sign in here') }}</a></span>
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
