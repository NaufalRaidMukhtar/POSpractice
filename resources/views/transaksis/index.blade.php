@extends('transaksis.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Transaksi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('transaksis.create') }}"> Tambah Transaksi</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga Barang</th>
            <th>Total Barang</th>
            <th>Total Harga</th>
            <th>Total Bayar</th>
            <th>Kembalian</th>
            <th>Tanggal Beli</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($transaksis as $transaksi)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $transaksi->nama_barang }}</td>
                <td>{{ $transaksi->harga_barang }}</td>
                <td>{{ $transaksi->stok }}</td>
                <td>{{ $transaksi->total_harga }}</td>
                <td>{{ $transaksi->total_bayar }}</td>
                <td>{{ $transaksi->kembalian }}</td>
                <td>{{ $transaksi->tanggal_beli }}</td>
                <td>
                    <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('transaksis.show', $transaksi->id) }}">Show</a>
                        <!-- <a class="btn btn-primary" href="{{ route('transaksis.edit', $transaksi->id) }}">Edit</a> -->
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Yakin Ingin Menghapus  {{ $transaksi->nama_barang }} ?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $transaksis->links() !!}
@endsection
