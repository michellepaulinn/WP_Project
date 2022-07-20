@extends('master')

@section('title', 'Transaction List')

@section ('content')
    <div class="container mx-auto p-5" style="min-height:420px;">
        {{-- {{dd($transaction)}} --}}
         {{-- @foreach ($transaction as $tr)
        <a href="/transaction/{{$tr->id}}">
            <div class="card p-2 m-2 bg-sec">
                <div class="card-title"> <h5 class="fw-bold p-3"> {{$tr->transactionStatus->status_name}} </h5> </div>
                <div class="card-body d-flex row mt-0">
                    <div class="card-text">
                         <p>Transaction id : {{ $tr->id }}</p> 
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
        </a> --}}
        @foreach ($transaction as $tr)
        <div class="card bg-sec m-2">
            <div class="card-header">
                <div class="card-title"> <h5 class="fw-bold pt-2 pb-2"> {{$tr->transactionStatus->status_name}} </h5> </div>
            </div>
            <div class="card-body">
              <h5 class="card-title">Transaction id : {{ $tr->id }}</h5>
              <br>
                        @php($total = 0)
                        @foreach($tr->transactionDetails as $trd)
                            @php($total += $trd->item->item_price)
                        @endforeach
                        {{number_format($total)}}
                <br>
              <a href="/transaction/{{$tr->id}}" class="btn btn-primary mt-2 mb-2">Update Order Status</a>
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