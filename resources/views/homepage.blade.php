@extends('master')

@section('title', 'Thrift Store')

@section ('content')
    <div class="container">
        @if (session('successPayment'))
            <div class="alert alert-success">
                {{ session('successPayment') }}
            </div>
        @endif
        <div class="newArrival">
            <div class="text-center m-4"><h2 class="title">New Arrivals</h2></div>
            <div class="d-flex container m-2 justify-content-between">
               @foreach ($items as $item)
                <a href="/item/{{ $item->id }}" class="mx-4">
                <div class="card border-0">
                    @foreach ($images as $image)
                        @if ($image->item_id === $item->id)
                            <img class="card-img-top" src="/photos/{{$image->item_image}}" alt="Card image cap" width="272" height="240" style="max-width: 272px; max-height: 240;">                       
                        @endif   
                    @endforeach
                    <div class="card-body text-center">
                        <h6 class="card-title">{{ $item->item_name }}</h6>
                        <p class="card-text">{{ number_format($item->item_price) }}</p>
                    </div>
                </div>
                </a>
               @endforeach
            </div>
        </div>
        <div class="text-center m-4"><h2 class="title">Shop By Category</h2></div>
        <div class="ShopCategory text-center d-flex justify-content-center">
            
            @foreach ($categories as $category)
                <div class="col-md-3 mx-2 category">
                    <div class="d-flex card shadow-sm rounded text-white category-card">
                        <a href="/category/{{ $category->id }}">
                            <img class="card-img ctg-img" src="{{$category->category_thumbnail}}" alt="{{ $category->category_name }}">
                            <div class="card-img-overlay m-auto dark-overlay d-flex justify-content-center align-items-center" >
                                <h4 class="text-white text-center cart-title" >{{ $category->category_name }}</h4>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
