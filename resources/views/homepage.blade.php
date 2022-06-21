@extends('master')

@section('title', 'Thrift Store')

@section ('content')
    <div class="container">
        <div class="carousel">

        </div>
        <div class="newArrival">
            <div><h2>New Arrivals</h2></div>
            <div class= "container">
                {{-- @foreach ($clothes as $baju)
                    {{$baju->id}}
                @endforeach --}}
            </div>
        </div>
        <div class="ShopCategory">
            <div><h2>Shop By Category</h2></div>
        </div>
    </div>
@endsection
