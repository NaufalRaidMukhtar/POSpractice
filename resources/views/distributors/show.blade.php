@extends('distributors.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Distributor</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('distributors.index') }}"> Back</a>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Distributor:</strong>
{{ $distributor->nama_distributor }}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Alamat:</strong>
{{ $distributor->alamat }}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>No.telp:</strong>
{{ $distributor->no_telp }}
</div>
</div>
</div>
@endsection