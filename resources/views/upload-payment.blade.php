@extends('master')

@section('title','Upload Payment')

@section('content')
    <h3>Upload Payment Proof</h3>
    <hr>
    <p>Please make payment to the bank account below:</p>
    <h3>BCA 0191456342 a.n PT.Thrift Store</h3>
    <h3>Amount: Rp. {{$total}}</h3>
    <hr>
    <p>After you make payment to the bank account, please upload the payment proof.</p>
    <p>Upload proof of transaction below:</p>
    <form action="/proceed-payment/{{ $trx->id }}/upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="payment_proof" id="payment_proof">
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
@endsection