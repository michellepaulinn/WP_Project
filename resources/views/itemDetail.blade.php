@extends('master')

@section('title', ''.$item->name.'')

@section('content')
    <div class="container d-flex justify-content-center" style="width:80%;">
        <div class="item-image flex-shrink">
            <img class="detail-img" src="{{$itemImage->item_image}}" alt="slide">
        </div>
        <div class="details align-self-center flex-grow-1 mx-4">
            <div class="item-name fs-3">{{$item->item_name}}</div>
            <div class="item-price">{{$item->item_price}}</div>
            <div class="description">{{$item->description}}</div>

            <button type="submit" class="btn btn-outline-dark">Add to Cart</button>
        </div>
        
    </div>

@endsection

