@extends('master')

@section('title', 'Thrift Store')

@section ('content')
    <div>
        {{-- {{dd($transaction)}} --}}
        @foreach ($transaction as $tr)
            <div class="card">
                <div class="card-title fw-bold">{{$tr->transactionStatus->status_name}}</div>
                <div class="card-body">
                    <div class="card-text">
                        {{$tr->transactionDetails()->count()}} Items
                        <br>
                        @php($total = 0)
                        @foreach($tr->transactionDetails as $trd)
                            @php($total += $trd->item->item_price)
                        @endforeach
                        {{number_format($total)}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>    
@endsection
