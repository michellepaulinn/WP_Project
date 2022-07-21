@extends('master')

@section('title','Checkout')

@section('content')
    <div class="container p-2" style="min-height: 70vh;">
        <h5 style="margin-top: 5px;">Checkout Detail</h5>
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
                            @foreach ($det->item->itemImages as $img)
                                @if ($loop->first)
                                    <img src="/photos/{{ $img->item_image }}" class="img-fluid rounded-start" alt="GAMBAR FASHION" height="50" width="90">
                                @endif
                            @endforeach    
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
                    <form action="/proceed-checkout" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control" name="nama" autofocus id="nama" placeholder="Receipient Name">
                        <label for="nama">Recepient Name</label>
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <textarea name="address" class="form-control" autofocus id="address" cols="30" rows="5" placeholder="Address"></textarea>
                        <label for="address">Shipping Address</label>
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" autofocus name="phone" id="phone" placeholder="Phone Number">
                        <label for="phone">Phone Number</label>
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <h6>Total:</h6>
                        <h2>IDR {{number_format($total )}}</h2>
                    </div>
                    
                    <input type="hidden" name="total" value="{{ $total }}">
                    <button type="submit" class="btn btn-prim">Make Order</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection