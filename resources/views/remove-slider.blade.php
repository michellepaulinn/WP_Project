@extends('master')

@section('title', 'Image Slider')

@section('content')
    @if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
    @endif
    <div style="min-height:73vh;">

        <div class="manage-games" style="padding-bottom: 50px; padding-top:18px;">
            <div class="game-list container d-flex flex-column align-items-center gap-2 mt-4" style="color: #396854;">
            <h1>Image Slider</h1>

            @foreach($sliders as $slider)
                <div class="card w-100 shadow bg-white rounded">
                    <div class="row g-0 m-2">
                        <div class="col">
                            <img src="/sliders/{{ $slider->slider_image }}" class=" img-fluid rounded-start" alt="GAMBAR FASHION" height="50" width="90">
                        </div>
                        
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">{{$slider->slider_image}}</h5>
                            </div>
                        </div>

                        <div class="col-md-3 d-flex flex-column align-items-end justify-content-center">
                            <div class="row manage-btn g-1">
                                <div class="col">
                                    <form action="/admin/slider_remove_process" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$slider->id}}">
                                        <button type="submit" class="btn btn-danger">REMOVE</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                @if ($sliders->isEmpty())
                <h3 class="card w-100 shadow bg-white rounded text-center p-4">There is no Item in Image Slider</h3>
                @endif
            </div>
        </div>
    </div>
@endsection

