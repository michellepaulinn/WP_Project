@extends('master')

@section('title','Transaction')

@section('content')
    <div class="container p-2" style="min-height:75vh;">
        <h3 class="bold py-2" style="color: #396854;font-weight:300;">Transaction Detail</h3>
        <!-- {{-- @dd($transaction) --}} -->
        <div class="content d-flex justify-content-between row">
        <!-- Cards Product -->
            <div class="content-left d-flex flex-column col-sm" style="padding-bottom: 18px;">
                <!-- {{-- {{dd($transaction)}} --}} -->
                <!-- {{-- {{dd($transaction->transactionDetails())}} --}} -->
                {{-- <div> --}}
                    <h5>Transaction ID: {{$transaction->id}}</h5>
                    
                {{-- </div> --}}
                <h5>Items:</h5>
                @foreach ($dets as $det)
                <div class="card bg-sec">
                    <div class="m-2 d-flex flex-row">
                        <div class="">
                            @foreach ($det->item->itemImages as $img)
                                @if ($loop->first)
                                    <img src="/photos/{{ $img->item_image }}" class="img-fluid rounded-start" alt="GAMBAR FASHION" height="50" width="90">
                                @endif
                            @endforeach
                        </div>
                        <div class="">
                            <div class="card-body">
                                <h5 class="card-title" style="color: #396854">{{ $det->item->item_name}}</h5>
                                <p class="card-text">
                                    <small class="text-muted text-light">IDR {{ number_format($det->item->item_price) }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>    
                @endforeach
            </div>
        <!-- Form Pengiriman -->
            <div class="content-right col-sm">
                <h5>Recipient:</h5>
                <form action="" method="post">
                    <div class="form-floating">
                        <input type="" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ $transaction->recipient_name }}" readonly>
                        <label for="floatingInput">Name</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingPhone" placeholder="Address" value="{{  $transaction->phone_number }}" readonly >
                        <label for="floatingPassword">Phone</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingAddress" placeholder="Address" value="{{  $transaction->shipping_address }}" readonly >
                        <label for="floatingPassword">Address</label>
                    </div>
                </form>
                <div class="my-3">
                    <h5>Total:</h5>
                    <h2>IDR {{number_format($total )}}</h2>
                </div>
                <h5>Status:</h5>
                <p class="fw-bold">{{$transaction->transactionStatus->status_name}}</p>
                @if ($transaction->transactionStatus->id == 1)
                <div class="d-flex gap-4" style="margin-bottom: 5px;">
                    <form action="/proceed-payment/{{$transaction->id}}" method="get">
                        @csrf
                        <input type="hidden" name="total" value="{{$total}}">
                        <button class="btn btn-prim btn-outline-light btn-lg px-3" type="submit">Make Payment</button>
                    </form>
                    <form action="/cancel/{{$transaction->id}}" method="POST">
                        @csrf
                        <button type="submit" onclick=" return confirm('Are You Sure?')" class="btn btn-lg btn-danger">Cancel Order</button>
                    </form>
                </div>
                @endif
            </div>
    </div>
@endsection