@extends('master')

@section('title', 'Thrift Store')

@section ('content')
Search Result
    <div class="d-flex flex-row">
        @foreach ($items as $item)
        <div class="card text-dark m-2" style="width: 12rem;">
          {{-- <img class="card-img" src="{{ asset('/images/'.$item->gameThumbnail)}}" alt="" > --}}
          <div class="card-body">
            <h5 class="card-title"><b>{{$item->item_name}}</b></h5>
            {{-- <p class="card-text">
              <span>{{ $item->description }}</span>
            </p> --}}
            <h6 class="card-title align-text-right"><b>{{$item->price}}</b></h6>
            <a href="/item/{{$item->id}}" class="btn bg-navy text-light">View Games</a>
          </div>
        </div>
        @endforeach
    </div>
@endsection