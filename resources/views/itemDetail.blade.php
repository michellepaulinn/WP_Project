@extends('master')

@section('title', ''.$item->item_name.'')

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
    
    <div class="row container d-flex justify-content-center" style="width:80%;">
        <div class="col item-image flex-shrink">
            <img class="detail-img" src="/photos/{{$itemImage->item_image}}" alt="slide" width="400" height="400">
        </div>
        <div class="col details align-self-center flex-grow-1 mx-4">
            <div class="item-name fs-3" style="margin-bottom: 5px;">{{$item->item_name}}</div>
            <div class="item-price" style="margin-bottom: 5px;">IDR {{number_format($item->item_price)}}</div>
            <div class="description" style="margin-bottom: 5px;">{{$item->description}}</div>
            @if(Auth::check() and Auth::user()->role_id == '1')
                <!-- Update -->
                    <a href="/admin/view_update_item/{{ $item->id }}" class="btn btn-success">Update</a>
                <!-- Delete -->
                    <a href="/admin/delete_item/{{ $item->id }}" class="btn btn-danger">Delete</a>
            @else
                <form action="/cart" method="post">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <button type="submit" class="btn btn-outline-dark">Add to Cart</button>
                </form> 
            @endif
        </div> 
    </div>

@endsection

  

