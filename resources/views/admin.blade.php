@extends('layouts.app')
   
@section('content')
    <div class="container">
        <div class="row justify-content-center">
 @if (Route::has('login'))
                <div class="hidden fixed top-4 left-4 px-10 py-10 sm:block">
                    @auth
                        <a href="{{ url('/transaksis') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">lihat Data</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">
                    <a href="{{ route('transaksis.index') }}"> buat transaksi</a></div>                 --}}
                    <div class="card-body">
                        Welcome Admin.
                    </div>
                    <div class="card-body">
                    HISTORY
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection