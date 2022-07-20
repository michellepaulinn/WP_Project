@extends('master')

@section('title', 'Review Transaction Proof')

@section('content')
<div class="container p-2 justify-content-center" style="min-height: 420px;">
    <h5 class="py-4">Review Transaction Proof</h5>
    <div class="content d-flex justify-content-between row">
    <!-- Cards Picture of proof -->
        <div class="content-left d-flex flex-column rounded shadow-sm col-sm">
            @if(!$img)
                <h6>Transaction Proof hasn't been uploaded yet...</h6>
            
            @else
                <h6>Transaction Proof</h6>
                <div class="card">
                    <div class="m-2 d-flex flex-row">
                        <div class="">
                            <img src="/photos/{{ $img->proof_image }}" class="img-fluid rounded-start" alt="GAMBAR FASHION" height="50" width="90">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    <!-- Form Pengiriman -->
        <div class="content-right col-sm">
            @if(!$img)
                <a href="/orders" class="text-decoration-none text-black"><button class="btn btn-prim">Back to transaction list</button></a>
            @else
            <button class="btn btn-success">Accept</button>
            <button class="btn btn-danger">Reject</button>
            @endif
        </div>
</div>
@endsection