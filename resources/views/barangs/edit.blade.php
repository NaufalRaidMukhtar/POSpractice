@extends('barangs.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit barang</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('barangs.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> ada yang salah tuuhh<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('barangs.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Barang:</strong>
                    <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control" placeholder="Nama Barang">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Merek:</strong>
                    <select class="form-control" name="nama_merek">
                        <option value="{{ $barang->nama_merek }}">{{ $barang->nama_merek }}</option>
                        @foreach ($merek as $id)
                        <option value="{{ $barang->nama_merek }}">{{ $barang->nama_merek }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Distributor:</strong>
                    <select class="form-control" name="nama_distributor">
                        <option value="{{ $barang->nama_distributor }}">{{ $barang->nama_distributor }}</option>
                        @foreach ($distributor as $id)
                            <option value="{{ $barang->nama_distributor }}">{{ $barang->nama_distributor }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga Barang:</strong>
                    <input type="number"min="0" name="harga_barang" value="{{ $barang->harga_barang }}" class="form-control"placeholder="Harga Barang">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga Beli:</strong>
                    <input type="number"min="0" name="harga_beli" value="{{ $barang->harga_beli }}" class="form-control"placeholder="Harga Beli">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stok:</strong>
                    <input type="number"min="0" name="stok" value="{{ $barang->stok }}" class="form-control"placeholder="Stok">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tgl Masuk:</strong>
                    <input type="date" name="tgl_masuk" value="{{ $barang->tgl_masuk }}" class="form-control"placeholder="Tgl Masuk">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Petugas:</strong>
                    <input type="string" name="nama_petugas" value="{{ $barang->nama_petugas }}" class="form-control"placeholder="Nama Petugas" readonly value="{{ Auth::user()->name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
