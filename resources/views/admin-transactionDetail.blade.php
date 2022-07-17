@extends('master')

@section('title','Transaction')

@section('content')
    <div class="container">
        <h5>Transaction Detail</h5>
        <!-- {{-- @dd($transaction) --}} -->
        <div class="content d-flex justify-content-between row">
        <!-- Cards Product -->
            <div class="content-left d-flex flex-column rounded shadow-sm col-sm">
                <!-- {{-- {{dd($transaction)}} --}} -->
                <!-- {{-- {{dd($transaction->transactionDetails())}} --}} -->
                <h6>Items:</h6>
                @foreach ($dets as $det)
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
                <h6>Transaction Status</h6>
                <!-- bikin validasi kalo belum bayar tampilin pesan belum dibayar, kalo udah tampilin fotonya -->
                @if( $transaction->proof)
                    <img src="/images/payment/{{$transaction->proof}}" alt="">
                @endif
                <p>{{$transaction->transactionStatus->status_name}}</p>
                <!-- Form -->
                <div class="form">        
                    <form action="checkout/proceed-payment/{{$transaction->id}}" method="POST">
                        @csrf
                        <div class="my-3">
                            <h6>Total:</h6>
                            <h2>IDR {{number_format($total )}}</h2>
                        </div>
                        <input type="hidden" name="total" value=2>
                        <button type="submit" class="btn btn-primary">Confirm Payment</button>
                    </form>

                </div>
            </div>
    </div>
@endsection