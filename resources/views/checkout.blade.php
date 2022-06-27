@extends('master')

@section('title','Checkout')

@section('content')
    <div class="container">
        <h6>Checkout Detail</h6>
        {{-- @dd($transaction) --}}
        <div class="content d-flex justify-content-between">

            <div class="content-left d-flex flex-column rounded m-4 p-4 shadow-sm">
                {{-- {{dd($transaction)}} --}}
                {{-- {{dd($transaction->transactionDetails())}} --}}
                <p>{{$transaction->transaction_date}}</p>
                @foreach ($cartDetail as $det)
                <div class="card d-flex flex-column">
                    <div>
                        {{$det->item->item_name}}
                    </div>
                    <div>
                        {{$det->item->item_price}}
                    </div>
                </div>
                @endforeach
            </div>
            <div class="content-right">
                <div class="user-profile">
                    {{$transaction->user->name}}
                </div>
                <div>
                    <h2>{{$total}}</h2>
                </div>
                <div>
                    <p>{{$transaction->transactionStatus->status_name}}</p>
                    <div>
                        {{-- Buat gambar bukti transaksi yang diupload cust --}}
                    </div>
                    <button type="submit" class="btn btn-primary"><a href="/proceed-payment/{{$transaction->id}}" class="text-decoration-none text-white">Proceed Payment</a></button>
                </div>

            </div>
        </div>
    </div>
@endsection