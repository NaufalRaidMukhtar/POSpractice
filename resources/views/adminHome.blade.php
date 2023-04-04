@extends('layouts.app')
   <i class="bi bi-box-arrow-in-right"></i>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <a class="btn btn-secondary" href="{{ route('transaksis.index') }}">WikraMart</a></div>
                <div class="card-body">
                    <th  value="{{ Auth::user()->name }}"></th>
                </div>
                <div class="card-body">
                    HISTORY
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection