@extends('master')

@section('title','Transaction')

@section('content')
    <div class="container p-2" style="min-height:73vh;">
        <h3 class="p-2">Transaction Detail</h3>
        <!-- {{-- @dd($transaction) --}} -->
        <div class="content d-flex justify-content-between row">
        <!-- Cards Product -->
            <div class="content-left d-flex flex-column col-sm">
                <!-- {{-- {{dd($transaction)}} --}} -->
                <!-- {{-- {{dd($transaction->transactionDetails())}} --}} -->
                <div>
                    <h5>Transaction ID:</h5>
                    <p>{{$transaction->id}}</p>
                </div>
                <h5>Items:</h5>
                @foreach ($dets as $det)
                <div class="card bg-sec">
                    <div class="m-2 d-flex flex-row">
                        <div class="">
                            <img src="/photos/{{ $det->item->itemImage->item_image }}" class="img-fluid rounded-start" alt="GAMBAR FASHION" height="50" width="90">
                        </div>
                        <div class="">
                            <div class="card-body">
                                <h5 class="card-title">{{ $det->item->item_name}}</h5>
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
                <form action="/proceed-payment/{{$transaction->id}}" method="post">
                    @csrf
                    <input type="hidden" name="total" value="{{$total}}">
                    <button class="btn btn-prim btn-outline-light btn-lg px-5" type="submit">Bayar Sekarang</button>
                </form>
                @endif
            </div>
    </div>
@endsection