@extends('master')
@section('title','Login Page')

@section('container')
    <h1>Login Page</h1>
    <form>
        <form action="/loginProcess" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            {{-- <br> --}}
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="poster">
                {{-- <br> --}}
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="rememberMe" id="rememberMe"><label for="rememberMe" class="form-check-label">Remember Me</label>
                <br>
            </div>
            <a href="/register">Don't have an account? Register Now!</a>
            <br>
            <input type="submit" class="btn bg-navy text-light" value="LOG IN">
        </form>

    </form>
@endsection