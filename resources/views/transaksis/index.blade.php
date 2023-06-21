@extends('transaksis.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <br>
                <h2>Transaksi</h2>
            </div>
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button onclick="window.print();" class="btn btn-primary"><i class="bi bi-download"></i> print data </button>
                .
                <a class="btn btn-success" href="{{ route('transaksis.create') }}"> Tambah Transaksi </a>
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">tambah transaksi</button> --}}
            </div>
        </div>
    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Tambah</button>
        </div>
        </div>
    </div>
    </div> --}}

    <br>
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
            <th width="280px"></th>
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
                        <a class="btn btn-info" href="{{ route('transaksis.show', $transaksi->id) }}"><i class="bi bi-eye"></i></a>
                        <a class="btn btn-primary" href="{{ route('transaksis.edit', $transaksi->id) }}"><i class="bi bi-pencil-square"></i></a>   
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Yakin Ingin Menghapus  {{ $transaksi->nama_barang }} ?')"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $transaksis->links() !!}
@endsection
