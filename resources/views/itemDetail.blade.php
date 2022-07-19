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
    
    <div class="row container d-flex justify-content-center py-5" style="padding-left: 50px;">
        <div class="col item-image flex-shrink">
            <img class="detail-img" src="/photos/{{$itemImage->item_image}}" alt="slide" width="500px";height="600px";>
        </div>
        <div class="col details align-self-center flex-grow-1 mx-4">
            <div class="title item-name fs-3" style="margin-top: -230px;font-size:30px;">{{$item->item_name}}</div>
            <div class="title item-name" style="color:#396854; font-weight:200; font-size:16px;">{{$category->category_name}}</div>
            <div class="title1 item-price" style="margin-bottom: 15px; color:black; font-weight:200; font-size:18px;">IDR {{number_format($item->item_price)}}</div>
            @if(Auth::check() and Auth::user()->role_id == '1')
                <!-- Update -->
                    <a href="/admin/view_update_item/{{ $item->id }}" class="btn btn-success">Update</a>
                <!-- Delete -->
                    <a href="/admin/delete_item/{{ $item->id }}" onclick=" return confirm('Are You Sure?')" class="btn btn-danger">Delete</a>
            @else
                <form action="/cart" method="post" class="mx-4">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <button type="submit" class="btn btn-outline-dark my-3" style="width: 440px;height:35px;color:#396854;">Add to Cart</button>
                </form> 
            @endif
            <hr>
            <div class="description" style="margin-bottom: 5px;">{{$item->description}}</div>
        </div> 
    </div>

@endsection

  

