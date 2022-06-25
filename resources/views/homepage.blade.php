@extends('master')

@section('title', 'Thrift Store')

@section ('content')
    <div class="container">

        <div class="newArrival">
            <div class="text-center m-4"><h2>New Arrivals</h2></div>
            <div class="d-flex container m-2 justify-content-between">
               @foreach ($items as $item)
                <a href="/item/{{ $item->id }}" class="mx-4">
                <div class="card border-0">
                    @foreach ($images as $image)
                        @if ($image->item_id === $item->id)
                            <img class="card-img-top " src="{{$image->item_image}}" alt="Card image cap">                       
                        @endif   
                    @endforeach
                    <div class="card-body text-center">
                        <h6 class="card-title">{{ $item->item_name }}</h6>
                        <p class="card-text">{{ $item->item_price }}</p>
                    </div>
                </div>
                </a>
               @endforeach
            </div>
        </div>
        <div class="text-center m-4"><h2>Shop By Category</h2></div>
        <div class="ShopCategory text-center d-flex">
            
            @foreach ($categories as $category)
                <div class="col-md-3 mx-2 ">
                    <div class="d-flex card shadow-sm rounded text-white ">
                        @if($category->category_name=='Outer')
                            <img style="" class="card-img ctg-img" src="https://cf.shopee.co.id/file/36499895b1f3656e855de178ed496006" alt="{{ $category->category_name }}">
                        @elseif($category->category_name=='Bottoms')
                            <img style="" class="card-img ctg-img" src="https://im.berrybenka.com/assets/upload/product/zoom/233942_bell-bottom-long-pants_navy_2H3TG.jpg" alt="{{ $category->category_name }}">
                        @elseif($category->category_name=='Tops')
                            <img style="" class="card-img ctg-img" src="https://i.pinimg.com/originals/f9/15/70/f91570c38dbaf402361eb14afd4c5999.png" alt="{{ $category->category_name }}">
                        @else
                            <img style="" class="card-img ctg-img" src="https://i.pinimg.com/originals/4b/2a/60/4b2a60c4af786f89a7afb1fc3a6ac8b2.jpg" alt="{{ $category->category_name }}">
                        @endif
                        <a href="/?category={{ $category->id }}" >
                            <div class="card-img-overlay m-auto dark-overlay d-flex justify-content-center align-items-center" >
                                <h4 class="text-white text-center cart-title" >{{ $category->category_name }}</h4>
                            </div>
                        </a>
                    </div>
                {{-- </a> --}}
                </div>
            @endforeach
        </div>
    </div>
@endsection
