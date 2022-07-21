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
    <div style="min-height:73vh;">
        @include('search-bar')
        <div class="container d-flex justify-content-center py-5" style="padding-left: 50px;">
            <div id="carouselExampleControls" class="col flex-shrink carousel slide" data-bs-ride="carousel">
            {{-- <div class="col flex-shrink"width="500px";height="600px";> --}}
                {{-- {{dd($itemImage)}} --}}
                <div class="carousel-indicators">
                    @php $x = 'active'; $ac = true; @endphp
                    @for($i=0; $i < count($itemImage); $i++)
                    @php if($i == 0){ $x = 'active'; $ac = true;} else {$x = ''; $ac=false;}  @endphp
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}" class="{{$x}}" aria-current="{{$ac}}" aria-label="Slide {{$i+1}}"></button>
                    @endfor
                </div>
                <div class="carousel-inner">
                    @php $i = 0; $x = 'active' @endphp
                    @foreach ($itemImage as $img)
                    @php if($i == 0) $x = 'active'; else $x = '';  @endphp
                        <div class="carousel-item carousel-img {{$x}}">
                            {{-- {{$img->item_image}} --}}
                            <img src="{{asset('/photos/'.$img->item_image)}}" class="rounded detail-img w-100 d-block" alt="Image Slider {{$i}}">
                        </div>
                        @php $i++; @endphp
                    @endforeach
                </div> 
                {{-- <img class="detail-img" src="/photos/Crop-Cardigan.jpg" alt="slide" width="500px";height="600px";> --}}
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        <div class="col details align-self-center flex-grow-1 mx-4">
            <div class="title item-name fs-3" style="margin-top: -230px;font-size:30px;">{{$item->item_name}}</div>
            <div class="title item-name" style="color:#396854; font-weight:200; font-size:16px;">{{$category->category_name}}</div>
            <div class="title1 item-price" style="margin-bottom: 15px; color:black; font-weight:200; font-size:18px;">IDR {{number_format($item->item_price)}}</div>
                @can('isAdmin')
                    <!-- Update -->
                    <a href="/admin/view_update_item/{{ $item->item_slug }}" class="btn btn-success">Update</a>
                    <!-- Delete -->
                    <a href="/admin/delete_item/{{ $item->item_slug }}" onclick=" return confirm('Are You Sure?')" class="btn btn-danger">Delete</a>
                @else
                    @if($item->item_status)
                        <form action="/cart" method="post" class="mx-4">
                            @csrf
                            <input type="hidden" name="item_slug" value="{{ $item->item_slug }}">
                            <button type="submit" class="btn-prim btn my-3" style="width: 440px;height:35px;">Add to Cart</button>
                        </form> 
                    @else
                        <button type="disabled" disabled class="btn-danger btn my-3" style="width: 440px;height:35px;">Sold Out</button>
                    @endif
                @endcan
                <hr>
                <div class="description" style="margin-bottom: 5px;">{{$item->description}}</div>
            </div> 
            
        </div>
        
    </div>
@endsection

  

