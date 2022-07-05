@extends('master')

@section('title', 'Thrift Store')

@section ('content')
    <div class="container mb-3">
        <div class="ShopCategory text-center d-flex">
            <div class="ctg d-flex justify-content-center w-100">
                @foreach($categories as $ctg)
                    <div class="ctg-item mx-2">
                        <a style="color:#396854" href="/category/{{$ctg->id}}">{{$ctg->category_name}}</a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="newArrival">
            <div class="catName text-center m-4"><h2 style="color:#396854;"class="title">{{ $items[0]->category->category_name }}</h2></div>
            <div class="d-flex flex-wrap container m-2 justify-content-between">
               @foreach ($items as $item)
                <a href="/item/{{ $item->id }}" class="m-3">
                <div class="card border-1" style="background-color:#ede6db;">
                    @foreach ($images as $image)
                        @if ($image->item_id === $item->id)
                            <img class="card-img-top p-3" src="/photos/{{$image->item_image}}" alt="Card image cap" width="272" height="240" style="width: 272px; height: 240;">                       
                        @endif
                    @endforeach
                    <div class="card-body text-center" style="color:#396854">
                        <h6 class="card-title">{{ $item->item_name }}</h6>
                        <p class="card-text">{{ number_format($item->item_price) }}</p>
                    </div>
                </div>
                </a>
               @endforeach
            </div>
        </div>
        
    </div>
@endsection