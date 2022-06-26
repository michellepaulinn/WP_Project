@extends('master')

@section('title', 'Register Page')

@section('auth-form')
    <div class="container-fluid py-3 d-flex justify-content-center h-100 col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card card-body bg-dark text-white p-5" style="border-radius: 1rem;">
            <form action="/register-process" method="post" class="mb-md-5 px-5">
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
                <h2 class="fw-bold mb-4 text-uppercase text-center">Register</h2>
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="name_field">Name</label>
                    <input type="name" name="name" id="name_field" class="form-control form px-5-control-lg">
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="email_field">Email</label>
                    <input type="email" name="email" id="email_field" class="form-control form px-5-control-lg">
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="password_field">Password</label>
                    <input type="password" name="password" id="password_field" class="form-control form px-5-control-lg">
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="cPassword_field">Confirm Password</label>
                    <input type="password" name="cPassword" id="cPassword_field" class="form-control form px-5-control-lg">
                </div>

                <div class="d-flex flex-row justify-content-between align-items-end mt-5">
                    <p class="mb-0">
                        <a href="/login" class="text-white fw-bold">Already registered? Login here!</a>
                    </p>

                    <button class="btn btn-outline-light btn-lg px-3" type="submit">REGISTER</button>
                </div>
            </form>
        </div>
    </div>
@endsection