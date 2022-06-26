@extends('master')

@section('title','Transaction')

@section('content')
    <div class="container">
        <h6>Transaction Detail</h6>
        <div class="content">
            <p>{{$transaction->date}}</p>
            
        </div>
    </div>
@endsection