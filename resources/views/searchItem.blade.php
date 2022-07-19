@extends('master')

@section('title', 'Thrift Store')

@section ('content')
  <div class="d-flex container justify-content-center p-5 flex-wrap gap-4">
    @foreach ($items as $item)
      <a href="/item/{{ $item->id }}" class="m-auto">
        <div class="card border-1" style="color: #396854;background-color:#ede6db;">
          @foreach ($images as $image)
            @if ($image->item_id === $item->id)
            <img class="card-img-top p-3" src="/photos/{{$image->item_image}}" alt="Card image cap">                       
            @endif   
          @endforeach
            <div class="card-body text-center">
               <h6 class="card-title">{{ $item->item_name }}</h6>
               <p class="card-text">{{ number_format($item->item_price) }}</p>
            </div>
        </div>
      </a>
    @endforeach
  </div>
@endsection