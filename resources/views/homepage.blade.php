@extends('master')

@section('title', 'Thrift Store')

@section ('content')
    <div class="container">

        <div class="newArrival">
            <div class="text-center"><h2>New Arrivals</h2></div>
            <div class="d-flex container m-2">
               @foreach ($items as $item)
                <div class="card p-4 mx-4">
                    @foreach ($images as $image)
                        @if ($image->item_id === $item->id)
                            <img class="card-img-top" src="{{$item->item_image}}" alt="Card image cap">                       
                        @endif   
                    @endforeach
                    <div class="card-block">
                        <h4 class="card-title">{{ $item->item_name }}</h4>
                        <p class="card-text">{{ $item->item_price }}</p>
                        <a href="/item/{{ $item->id }}" class="btn btn-dark">View</a>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
        <div class="text-center m-2"><h2>Shop By Category</h2></div>
        <div class="ShopCategory text-center d-flex">
            
            @foreach ($categories as $category)
                <div class="col-md-3 mx-2">
                    <div class="card bg-dark text-white">
                        @if($category->category_name=='Outer')
                            <img style="min-height: 250px; max-height: 270px" class="card-img" src="https://cf.shopee.co.id/file/36499895b1f3656e855de178ed496006" alt="{{ $category->category_name }}">
                        @elseif($category->category_name=='Bottoms')
                            <img style="min-height: 250px; max-height: 270px" class="card-img" src="https://im.berrybenka.com/assets/upload/product/zoom/233942_bell-bottom-long-pants_navy_2H3TG.jpg" alt="{{ $category->category_name }}">
                        @elseif($category->category_name=='Tops')
                            <img style="min-height: 250px; max-height: 270px" class="card-img" src="https://i.pinimg.com/originals/f9/15/70/f91570c38dbaf402361eb14afd4c5999.png" alt="{{ $category->category_name }}">
                        @else
                            <img style="min-height: 250px; max-height: 270px" class="card-img" src="https://i.pinimg.com/originals/4b/2a/60/4b2a60c4af786f89a7afb1fc3a6ac8b2.jpg" alt="{{ $category->category_name }}">
                        @endif
                        <div class="d flex card-img-overlay justify-content-center text-center">
                            <h4 class="card-title text-center">{{ $category->category_name }}</h4>
                            <a href="/?category={{ $category->id }}" class="text-center btn btn-dark">See All</a>
                        </div>
                    </div></a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
