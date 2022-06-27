@extends('master')

@section('title', 'Checkout')

@section('content')
    <div class="manage-games">
        <div class="game-list container d-flex flex-column align-items-center gap-2 mt-4">
            <h1>Checkout</h1>

            <div class="card w-100 shadow bg-white rounded">
                <div class="row g-0 m-2">
                    <div class="col">
                        <img src="" class="img-fluid rounded-start" alt="GAMBAR FASHION" height="84" width="180">
                    </div>
                    
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">Nama Clothes</h5>

                            <p class="card-text">
                                <small class="text-muted text-light">Description</small>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 d-flex flex-column align-items-end justify-content-center">
                        <div class="row">
                            <p class="card-text">Rp 139.000</p>
                        </div>

                        <div class="row manage-btn g-1">
                            <div class="col">
                                <a href="#" class="btn btn-danger">REMOVE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card w-100 shadow bg-white rounded">
                <div class="row g-0 m-2">
                    <div class="col-md-9">
                        <div class="card-body">
                            <h5 class="card-title">Total</h5>

                            <p class="card-text">
                                <small class="text-muted text-light">2 clothe(s)</small>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 d-flex flex-column align-items-end justify-content-center">
                        <div class="row">
                            <p class="card-text">Rp 999.999</p>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#" class="btn btn-outline-dark d-flex align-self-end mt-3 me-3">CHECKOUT</a>
        </div>
    </div>
@endsection

