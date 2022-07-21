@extends('master')

@section('title', 'Thrift Store')

@section ('content')

@include('search-bar')

<div class="d-flex container justify-content-center p-5 flex-wrap gap-4" style="min-height: 70vh;">
    @forelse ($items as $item)
    <a href="/item/{{ $item->item_slug }}" class="m-auto">
        <div class="card border-1" style="color: #396854;background-color:#ede6db;">
            <img class="card-img-top p-3" src="/photos/{{ $item->itemImages->first()->item_image }}" alt="Card image cap">
            <div class="card-body text-center">
                <h6 class="card-title">{{ $item->item_name }}</h6>
                <p class="card-text">
                    @if ($item->item_status == true)
                        {{ number_format($item->item_price) }}
                    @else
                        <b>Sold Out</b>
                    @endif
                </p>
            </div>
        </div>
    </a>
    @empty
        <h3>No Results</h3>
    @endforelse
        
</div>

<div class="d-flex flex-row justify-content-between mx-5" style="padding-bottom: 4px;margin-top:5px;">
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
@endsection