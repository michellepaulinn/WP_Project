@extends('master')

@section('title', 'Thrift Store')

@section ('content')
Search Result
    <div class="d-flex flex-row flex-wrap justify-content-center">
        @foreach ($items as $item)
          <a href="/item/{{ $item->id }}" class="mx-4">
            <div class="card border-0 "style="width:10rem;">
              @foreach ($images as $image)
                @if ($image->item_id === $item->id)
                  <img class="card-img-top " src="/photos/{{$image->item_image}}" alt="Card image cap">                       
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