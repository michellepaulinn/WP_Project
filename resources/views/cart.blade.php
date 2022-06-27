@extends('master')

@section('title', 'Cart')

@section('content')
    <div class="manage-games">
        <div class="game-list container d-flex flex-column align-items-center gap-2 mt-4">
            <h1>Your Cart</h1>

            @foreach($cartDetails as $cartDetail)
                <div class="card w-100 shadow bg-white rounded">
                    <div class="row g-0 m-2">
                        <div class="col">
                            <img src="{{ $cartDetail->item->itemImage->item_image }}" class="img-fluid rounded-start" alt="GAMBAR FASHION" height="84" width="180">
                        </div>
                        
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">{{$cartDetail->item->item_name}}</h5>

                                <p class="card-text">
                                    <small class="text-muted text-light">{{ $cartDetail->item->description }}</small>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-3 d-flex flex-column align-items-end justify-content-center">
                            <div class="row">
                                <p class="card-text">{{$cartDetail->item->item_price}}</p>
                            </div>

                            {{-- <form action="{{route('delete')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <input type="submit" value="Delete" class="btn">
                            </form>     --}}

                            <div class="row manage-btn g-1">
                                <div class="col">
                                    <form action="/delete" method="post">
                                        @csrf
                                        <input type="hidden" name="item_id" value="{{$cartDetail->item_id}}">
                                        <button type="submit" class="btn btn-danger">REMOVE</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
            
            <div class="card w-100 shadow bg-white rounded">
                <div class="row g-0 m-2">
                    <div class="col-md-9">
                        <div class="card-body">
                            <h5 class="card-title">Total</h5>

                            <p class="card-text">
                                <small class="text-muted text-light">{{ count($cartDetails); }} clothe(s)</small>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 d-flex flex-column align-items-end justify-content-center">
                        <div class="row">
                            <p class="card-text">{{$totalPrice}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="/checkout" class="btn btn-outline-dark d-flex align-self-end mt-3 me-3">CHECKOUT</a>
        </div>
    </div>
@endsection

