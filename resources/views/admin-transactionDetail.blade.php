@extends('master')

@section('title','Transaction')

@section('content')
    <div class="container" style="min-height:73vh">
        <h3 class="bold py-2" style="color: #396854;font-weight:300;">Transaction Detail</h3>
        <!-- {{-- @dd($transaction) --}} -->
        <div class="content d-flex justify-content-between row">
        <!-- Cards Product -->
            <div class="content-left d-flex flex-column col-sm" style="padding-bottom: 15px;margin-bottom: 28px;">
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
            <div class="content-right col-sm m-auto">
                <h6>Payment:</h6>
                <div class="card m-auto " style="width: 30rem">
                <!-- bikin validasi kalo belum bayar tampilin pesan belum dibayar, kalo udah tampilin fotonya -->
                    @if( $transaction->proof)
                        <img src="/images/payment/{{$transaction->proof}}" style="width: 100%" class="card-img-top m-auto" alt="">
                        <p class="m-auto">Transaction Proof</p>
                    @else
                        <h5 class="m-auto">Payment has not been made</h5>
                    @endif
                </div>
                <p>Transaction Status: </p>
                <h4 class="inline-block m-auto">{{$transaction->transactionStatus->status_name}}</h4>
                <!-- Form -->
                <div class="form">        
                    <form action="checkout/proceed-payment/{{$transaction->id}}" method="POST">
                        @csrf
                        <div class="my-3">
                            <h6>Total:</h6>
                            <h2>IDR {{number_format($total )}}</h2>
                        </div>
                        
                        @if($transaction->transactionStatus->id == 1)
                        <a href="/admin/orders"><button class="btn btn-primary">Back to Transaction List</button></a>
                        @elseif($transaction->transactionStatus->id == 2)
                        <input type="hidden" name="total" id="total" value=3>
                        <button type="submit" class="btn btn-prim">Confirm Payment</button>
                        @elseif($transaction->transactionStatus->id == 3)
                        <input type="hidden" name="total" id="total" value=4>
                        <button type="submit" class="btn btn-prim">Order is shipped</button>
                        @elseif($transaction->transactionStatus->id == 4)
                        <input type="hidden" name="total" id="total" value=5>
                        <button type="submit" class="btn btn-prim">Finish Transaction</button>
                        @endif
                    </form>

                </div>
            </div>
    </div>
@endsection