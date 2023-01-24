@extends('transaksis.layout')
@section('content')
@if ($message = Session::get('error'))
        <div class="alert alert-error">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data transaksi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('transaksis.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('transaksis.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Barang:</strong>
                    <select name="nama_barang" id="" class="form-control">
                        <option value="">Nama Barang</option>
                        @foreach ($nama_barang as $id)
                            <option value="{{ $id->nama_barang }}"> {{ $id->nama_barang }} | stok : {{ $id->stok }} |</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                         <strong>Harga Barang:</strong>
                         <div id="harga">
                            <input type="number" disabled id="harga_barang" name="harga_barang" class="form-control" placeholder="Total Harga">
                         </div>
                </div>  
            </div> 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total Barang:</strong>
                    <input type="number" name="stok" class="form-control" id="total_barang" placeholder="Total_barang">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                         <strong>Total Harga:</strong>
                        <input type="number" disabled id="total_bayar" class="form-control" placeholder="Total Harga">
                </div>  
            </div> 

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total Bayar:</strong>
                    <input type="number"min="0" name="total_bayar" class="form-control" placeholder="Total bayar">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
   
                <button type="submit" class="btn btn-primary">Submit</button>
                 
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('#nama_barang').on('change', function() {
                var namaBarang = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '{{ route('getHarga') }}?nama_barang=' + namaBarang,
                    dataType: 'json',
                    success: function (response) {
                        $.each(response.hargas, function (key, item) {
                            console.log('Succes');
                            $('#harga').empty();
                            $('#harga').append('<input class="form-control" id="harga_barang" name="harga_barang" value="'+ item.harga_barang +'" style="cursor: not-allowed;">')
                        });
                    }
                });
            })
        });
    </script>
    <script>
        $('#total_barang').keyup(function () {
            var barang = $('#total_barang').val();
            var harga = $('#harga_barang').val();
            var total = parseInt(barang) * parseInt(harga);
            $('#total_bayar').val(total);
        });
</script>
@endsection
