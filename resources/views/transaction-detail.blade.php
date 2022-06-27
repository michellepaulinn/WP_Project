@extends('master')

@section('title','Transaction')

@section('content')
    <div class="container">
        <h6>Transaction Detail</h6>
        <div class="content d-flex justify-content-between">

            <div class="content-left d-flex flex-column rounded m-4 p-4 shadow-sm">
                {{-- {{dd($transaction)}} --}}
                {{-- {{dd($transaction->transactionDetails())}} --}}
                <p>{{$transaction->transaction_date}}</p>
                @foreach ($dets as $det)
                <div class="card d-flex flex-column">
                    <div class="card w-100 shadow bg-white rounded">
                        <div class="row g-0 m-2">
                            <div class="col card-img-left" style="width:5rem;">
                                <img src="{{ $det->item->itemImage->item_image }}" class="img-fluid rounded-start" alt="GAMBAR FASHION" height="84" width="180">
                            </div>
                            
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title">{{$det->item->item_name}}</h5>
                                    <p class="card-text">
                                        <small class="text-muted text-light">{{ $det->item->item_price }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
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
                    <form action="/confirm-payment/{{$transaction->id}}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value=3>
                        <button type="submit" class="btn btn-primary">Confirm Payment</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection