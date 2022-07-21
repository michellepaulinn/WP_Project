@extends('master')

@section('title', 'Thrift Store')

@section ('content')
    @include('search-bar')
    <div class="container" style="padding-bottom: 36px; padding-top:18px;">
        <div class="ShopCategory text-center d-flex my-4 ">
            <div class="ctg d-flex justify-content-center ctg-border w-100" >
                @foreach($categories as $ctg)
                    <div class="ctg-item mx-2">
                        <a style="color:#396854" href="/category/{{ $ctg->category_slug }}">{{ $ctg->category_name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="newArrival">
            <div class="catName text-center m-4"><h2 style="color:#396854;"class="title">{{ $items[0]->category->category_name }}</h2></div>
            <div class="d-flex flex-wrap container m-2 justify-content-between">
               @foreach ($items as $item)
                <a href="/item/{{ $item->item_slug }}" class="m-3">
                <div class="card border-1" style="background-color:#ede6db;">
                    <img class="card-img-top p-3" src="/photos/{{ $item->itemImages->first()->item_image }}" alt="Card image cap">
                    <div class="card-body text-center" style="color:#396854">
                        <h6 class="card-title">{{ $item->item_name }}</h6>
                        <p class="card-text">{{ number_format($item->item_price) }}</p>
                    </div>
                </div>
                </a>
               @endforeach
            </div>
        </div>

        <div class="d-flex flex-row justify-content-between mx-5">
            <div class="d-flex align-items-center text-muted">
                @if ($items->total() === 0)
                    Showing {{ $items->total() }} result
                @else
                    Showing {{ $items->firstItem() }} to {{ $items->lastItem() }} of {{ $items->total() }} results
                @endif
            </div>
            <div>
                {{ $items->appends($_GET)->links() }}
            </div>
        </div>
    </div>
@endsection