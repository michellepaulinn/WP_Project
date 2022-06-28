@extends('master')

@section('title', 'Thrift Store')

@section ('content')
    <div class="container">
        <div class="ShopCategory text-center d-flex">
            <div class="ctg d-flex justify-content-center w-100">
                @foreach($categories as $ctg)
                    <div class="ctg-item mx-2">
                        <a href="/category/{{$ctg->id}}">{{$ctg->category_name}}</a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="newArrival">
            <div class="catName text-center m-4"><h2 class="title">{{ $items[0]->category->category_name }}</h2></div>
            <div class="d-flex flex-wrap container m-2 justify-content-between">
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
                        <p class="card-text">{{ $item->item_price }}</p>
                    </div>
                </div>
                </a>
               @endforeach
            </div>
        </div>
        
    </div>
@endsection