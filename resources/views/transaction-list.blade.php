@extends('master')

@section('title', 'Transaction List')

@section ('content')
    <div class="container mx-auto p-5" style="min-height:73vh">
        @foreach ($transaction as $tr)
        <div class="card bg-sec m-2">
            <div class="card-header">
                <div class="card-title"> <h5 class="fw-bold pt-2"> {{$tr->transactionStatus->status_name}} </h5> </div>
            </div>
            <div class="card-body d-flex justify-content-between">
                <div>
                    <h5>Transaction id : {{ $tr->id }}</h5>
                    @php($total = 0)
                    @foreach($tr->transactionDetails as $trd)
                        @php($total += $trd->item->item_price)
                    @endforeach
                    <h6>IDR {{number_format($total)}}</h6>
                </div>
                <div>
                    @if(($tr->transaction_status_id == 5 or $tr->transaction_status_id == 6) or Auth::check() and Auth::user()->role_id == '2')
                    <a href="/transaction/{{$tr->id}}" class="btn btn-prim mt-2 mb-2">View Transaction Detail</a>
                    @else
                    <a href="/transaction/{{$tr->id}}" class="btn btn-prim mt-2 mb-2">Update Transaction Status</a>
                    @endif
                </div>
            </div>
          </div>
        @endforeach
    </div>    
@endsection

<style>
    .isi{
        background-color: #f7f6f2;
    }

</style>