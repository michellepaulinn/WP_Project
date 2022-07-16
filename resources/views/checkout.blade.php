@extends('master')

@section('title','Checkout')

@section('content')
    <div class="container">
        <h5>Checkout Detail</h5>
        <!-- {{-- @dd($transaction) --}} -->
        <div class="content d-flex justify-content-between row">
        <!-- Cards Product -->
            <div class="content-left d-flex flex-column rounded shadow-sm col-sm">
                <!-- {{-- {{dd($transaction)}} --}} -->
                <!-- {{-- {{dd($transaction->transactionDetails())}} --}} -->
                <h6>Items:</h6>
                @foreach ($cartDetail as $det)
                <div class="card">
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
                <h6>Shipping Detail</h6>
                <!-- Form -->
                <div class="form">        
                    <form action="checkout/proceed-payment/{{$transaction->id}}" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control" name="nama" autofocus id="nama" placeholder="Receipient Name">
                        <label for="nama">Recepient Name</label>
                    </div>
                    <div class="form-floating">
                        <textarea name="address" class="form-control" autofocus id="address" cols="30" rows="5" placeholder="Address"></textarea>
                        <label for="address">Shipping Address</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" autofocus name="phone" id="phone" placeholder="Phone Number">
                        <label for="phone">Phone Number</label>
                    </div>
                    <div class="my-3">
                        <h6>Total:</h6>
                        <h2>IDR {{number_format($total )}}</h2>
                    </div>
                    
                    <input type="hidden" name="total" value="{{ $total }}">
                    <button type="submit" class="btn btn-primary">Make Order</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection