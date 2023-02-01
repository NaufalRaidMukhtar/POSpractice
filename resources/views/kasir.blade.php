@extends('layouts.app')
   
<nav class="navbar navbar-expand-lg navbar-light bg-info">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
@section('content')
</nav>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <a href="{{ route('transaksis.index') }}"> buat transaksi</a></div>  
                <div class="card-body">
                    selamat datang Kasir
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
