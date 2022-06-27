@extends('master')

@section('title', ''.$item->name.'')

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

    <div class="container d-flex justify-content-center" style="width:80%;">
        <div class="item-image flex-shrink">
            <img class="detail-img" src="{{$itemImage->item_image}}" alt="slide">
        </div>
        <div class="details align-self-center flex-grow-1 mx-4">
            <div class="item-name fs-3">{{$item->item_name}}</div>
            <div class="item-price">{{$item->item_price}}</div>
            <div class="description">{{$item->description}}</div>

            <form action="/cart" method="post">
                @csrf
                <input type="hidden" name="item_id" value="{{$item->id}}">
                <button type="submit" class="btn btn-outline-dark">Add to Cart</button>
            </form> 
        </div> 
    </div>

@endsection

  

