@extends('master')

@section('title', 'Login Page')

@section('auth-form')
    <div class="container-fluid py-5 d-flex justify-content-center h-100 col-12 col-md-8 col-lg-6 col-xl-5" style="padding-bottom: 0px;padding-top:0px;">
        <div class="login bg-sec card card-body text-white p-5" style="border-radius: 0.5rem;">
            <form action="/login-process" method="post" class="mb-3 md-5 px-5">
                <h2 class="fw-bold mb-2 text-uppercase text-center">Login</h2>
                @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                @endif

                @csrf
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="email_field" style="font-weight: 500">Email</label>
                    <input type="email" name="email" id="email_field" class="form-control form-control-lg" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="password_field" style="font-weight: 500">Password</label>
                    <input type="password" name="password" id="password_field" class="form-control form-control-lg">

                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-outline form-white mb-4">
                    <input type="checkbox" name="remember_me" id="remember_me" class="form-check-input"
                        @if (old('remember_me'))
                            checked
                        @endif
                    >
                    <label for="remember_me"> Remember Me</label>
                </div>

                <div class="text-center">
                    <button class="tbl btn btn-prim btn-outline-light btn-lg px-5" type="submit">Login</button>
                </div>
            </form>

            <div class="text-center">
                <p class="mb-0">
                    <a href="/register" class="fw-bold" style="color:#396854;">Don't have an account? Register Now!</a>
                </p>
            </div>
        </div>
    </div>
@endsection