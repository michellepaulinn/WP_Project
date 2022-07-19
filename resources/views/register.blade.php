@extends('master')

@section('title', 'Register Page')

@section('auth-form')
    <div class="container-fluid py-3 d-flex justify-content-center h-100 col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="bg-sec card card-body p-5" style="border-radius: 0.5rem; color:#396854;">
            <form action="/register-process" method="post" class="mb-md-5 px-5">
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif

                @csrf
                <h2 class="fw-bold mb-4 text-uppercase text-center">Register</h2>
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="name_field" style="font-weight: 500">Name</label>
                    <input type="name" name="name" id="name_field" class="form-control form px-5-control-lg" value="{{ old('name') }}">

                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="email_field" style="font-weight: 500">Email</label>
                    <input type="email" name="email" id="email_field" class="form-control form px-5-control-lg" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="password_field" style="font-weight: 500">Password</label>
                    <input type="password" name="password" id="password_field" class="form-control form px-5-control-lg">

                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="cPassword_field" style="font-weight: 500">Confirm Password</label>
                    <input type="password" name="cPassword" id="cPassword_field" class="form-control form px-5-control-lg">

                    @error('cPassword')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex flex-column justify-content-between">
                    <button class="btn btn-prim btn-outline-light btn-lg px-3" type="submit">REGISTER</button>
                    <p class="mt-3 text-center">
                        <a href="/login" class="fw-bold" style="color: #396854">Already registered? Login here!</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection