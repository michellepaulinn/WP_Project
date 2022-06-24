@extends('master')

@section('title', 'Login Page')

@section('auth-form')
    <div class="container-fluid py-5 d-flex justify-content-center h-100 col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card card-body bg-dark text-white p-5" style="border-radius: 1rem;">
            <form action="/login-process" method="post" class="mb-md-5 px-5">
                <h2 class="fw-bold mb-2 text-uppercase text-center">Login</h2>
                @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                @endif

                @if (count($errors) > 0)
                    <div class = "alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif

                @csrf
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="email_field">Email</label>
                    <input type="email" name="email" id="email_field" class="form-control form-control-lg">
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="password_field">Password</label>
                    <input type="password" name="password" id="password_field" class="form-control form-control-lg">
                </div>

                <div class="text-center">
                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                </div>
            </form>

            <div class="text-center">
                <p class="mb-0">
                    <a href="/register" class="text-white fw-bold">Don't have an account? Register Now!</a>
                </p>
            </div>
        </div>
    </div>
@endsection