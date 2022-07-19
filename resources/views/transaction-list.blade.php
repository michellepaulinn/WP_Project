@extends('master')

@section('title', 'Transaction List')

@section ('content')
    <div class="container mx-auto p-5" style="min-height:420px;">
        {{-- {{dd($transaction)}} --}}
         @foreach ($transaction as $tr)
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
        </a>
            
        @endforeach
    </div>    
@endsection

<style>
    .isi{
        background-color: #f7f6f2;
    }

</style>