@extends('master')

@section('title', 'Thrift Store')

@section ('content')
    <div class="container" style="padding-bottom: 50px;">
        @include('search-bar')
        @if (session('successPayment'))
            <div class="alert alert-success">
                {{ session('successPayment') }}
            </div>
        @endif

        @if (session('successItem'))
            <div class="alert alert-success">
                {{ session('successItem') }}
            </div>
        @endif
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php $i = 0; $x = 'active' @endphp
                @foreach ($sliders as $slider)
                @php if($i == 0) $x = 'active'; else $x = '';  @endphp
                    <div class="carousel-item carousel-img {{$x}}">
                        <img src="{{ asset('/sliders/'.$slider->slider_image)}}" class="d-block w-100" alt="Image Slider {{$i}}">
                    </div>
                    @php $i++; @endphp
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        {{-- @if(Auth::check() and Auth::user()->role_id == '1')
        <div class="edit-carousel d-flex justify-content-center mt-4 gap-4">
            <a href="/admin/view_slider_add" class="btn btn-success px-5 py-2">Add</a>
            <a href="/admin/view_slider_remove" class="btn btn-danger px-5 py-2">Delete</a>
        </div>
        @endif --}}
        <div class="newArrival">
            <div class="text-center m-4"><h2 class="title">New Arrivals</h2></div>
            <div class="d-flex container m-2 justify-content-between flex-wrap">
               @foreach ($items as $item)
                <a href="/item/{{ $item->item_slug }}" class="mx-2 my-4">
                <div class="card border-1" style="color: #396854;background-color:#ede6db;">
                    <img class="card-img-top p-3" src="/photos/{{$item->itemImages->first()->item_image}}" alt="Card image cap"><div class="card-body text-center">
                        <h6 class="card-title">{{ $item->item_name }}</h6>
                        <p class="card-text">{{ number_format($item->item_price) }}</p>
                    </div>
                </div>
                </a>
               @endforeach
            </div>
        </div>

        {{-- Why should we Thrift? --}}
        <div class="why bg-sec d-flex p-4 mb-4 rounded">
            <div class="left p-4 m-4">
                <h3 class="title">Why thrift?</h3>
                <p>
                    Globally, there are 92 million tonnes of fashion waste annually.
                    Thrifting is one of ways to help the environment. It gives clothes second chances in life as well as reduce pollution and waste at the same time.
                </p>
            </div>
            <div class="right">
                <img src="https://i0.wp.com/isellerdotblog.wpcomstaging.com/wp-content/uploads/2022/03/unnamed-1.png?fit=512%2C384&ssl=1" alt="" class="rounded"style="width:50vh;">
            </div>
        </div>

        {{-- Shop By Category --}}
        <div class="text-center m-4"><h2 class="title">Shop By Category</h2></div>
        <div class="ShopCategory text-center d-flex justify-content-center mb-4">
            
            @foreach ($categories as $category)
                <div class="mx-2 category">
                    <div class="d-flex card shadow-sm rounded text-white category-card">
                        <a href="/category/{{ $category->category_slug }}">
                            <img class="card-img ctg-img" src="{{$category->category_thumbnail}}" alt="{{ $category->category_name }}">
                            <div class="card-img-overlay m-auto dark-overlay d-flex justify-content-center align-items-center" >
                                <h4 class="text-white text-center cart-title" >{{ $category->category_name }}</h4>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- About Us --}}
        <div class="about-us text-center p-4 m-4">
            <h2 class="mb-2 title">About Us</h2>
            <p>Thrift store is a store that sells curated fashion</p>
        </div>

    </div>
@endsection
