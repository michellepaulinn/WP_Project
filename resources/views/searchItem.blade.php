@extends('master')

@section('title', 'Thrift Store')

@section ('content')
<div class="d-flex container justify-content-center p-5 flex-wrap gap-4">
    @foreach ($items as $item)
    <a href="/item/{{ $item->id }}" class="m-auto">
        <div class="card border-1" style="color: #396854;background-color:#ede6db;">
            <img class="card-img-top p-3" src="/photos/{{ $item->itemImages->first()->item_image }}" alt="Card image cap">
            <div class="card-body text-center">
                <h6 class="card-title">{{ $item->item_name }}</h6>
                <p class="card-text">{{ number_format($item->item_price) }}</p>
            </div>
        </div>
    </a>
    @endforeach
</div>

<div class="d-flex flex-row justify-content-between mx-5 my-2">
    <div class="d-flex align-items-center text-muted">
        @if ($items->total() === 0)
            Showing {{ $items->total() }} result
        @else
            Showing {{ $items->firstItem() }} to {{ $items->lastItem() }} of {{ $items->total() }} results
        @endif
    </div>
    <div class="">
        {{ $items->appends($_GET)->links() }}
    </div>
</div>
@endsection