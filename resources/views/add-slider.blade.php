@extends('master')

@section('title', 'Add Slider Image')

@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @elseif (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    
    <div class="container-fluid py-3 d-flex justify-content-center h-100 col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card card-body text-white p-5" style="border-radius: 0.5rem;background-color:#ede6db;">
            <form action="/admin/slider_add_process" method="post" class="mb-md-5 px-5" enctype="multipart/form-data" style="color: #396854;font-weight:500;">
                @csrf
                <h2 class="fw-bold mb-5 text-uppercase text-center">Add Slider Image</h2>
                <div class="form-group mt-4">
                    <label for="image">Slider Image</label>
                    <input type="file" name="sliderImage" id="sliderImage" class="form-control-file">
                </div>
                <div class="d-flex flex-row justify-content-between align-items-end mt-5">
                    <button class="btn btn-outline-light btn-lg px-3" type="submit" style="color: #396854">Add Slider</button>
                </div>
            </form>
        </div>
    </div>
@endsection