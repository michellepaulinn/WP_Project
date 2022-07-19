@extends('master')

@section('title','Upload Payment')

@section('content')
    {{-- <h3>Shipment Details</h3> --}}
    {{-- <hr> --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container d-flex flex-col justify-content-end p-4"style="min-height:73vh">
        <div class="container">
            <h3>Detail Recipient:</h3>
            <form action="" method="post">
                <div class="form-floating mb-1">
                    <input type="" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ $trx->recipient_name }}" readonly>
                    <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control" id="floatingPhone" placeholder="Address" value="{{  $trx->phone_number }}" readonly >
                    <label for="floatingPassword">Phone</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingAddress" placeholder="Address" value="{{  $trx->shipping_address }}" readonly >
                    <label for="floatingPassword">Address</label>
                </div>
            </form>
        </div>
        <div class="separator">
            <hr class="m-auto"   style="height:65vh;border-right:1px solid black;position:absolute;right:50%;">
        </div>
        <div class="container">
            <p>Please make payment to the bank account below:</p>
            <h3>BCA 0191456342 a.n PT.Thrift Store</h3>
            <h3>Amount: Rp. {{ number_format($total)}}</h3>
            <hr>
            <p>After you make payment to the bank account, please upload the payment proof.</p>
            <p>Upload proof of transaction below:</p>
            <form action="/checkout/proceed-payment/uploads/{{ $trx->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="payment_proof" required id="payment_proof" class="form-control">
                <button type="submit" class=" mt-3 btn btn-prim btn-outline-light btn-lg px-5">Upload</button>
            </form>
        </div>
    </div>

    
@endsection