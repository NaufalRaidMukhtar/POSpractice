@extends('barangs.layout')
@section('content')

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
            <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Barang</h2>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button onclick="window.print();" class="btn btn-primary"><i class="bi bi-download"></i> print data </button>
                .
                <a class="btn btn-success" href="{{ route('barangs.create') }}"> Tambah barang</a>
            </div>
        </div>
    </div>
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
            <th>Nama Merek</th>
            <th>Nama Distributor</th>
            <th>Harga Beli</th>
            <th>Harga Barang</th>
            <th>Stok</th>
            <th>Tgl Masuk</th>
            <th>Nama Petugas</th>
            <th width="280px"></th>
        </tr>
        @foreach ($barangs as $barang)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->nama_merek }}</td>
                <td>{{ $barang->nama_distributor }}</td>
                <td>{{ $barang->harga_barang }}</td>
                <td>{{ $barang->harga_beli }}</td>
                <td>{{ $barang->stok }}</td>
                <td>{{ $barang->tgl_masuk }}</td>
                <td>{{ $barang->nama_petugas}}</td>
                <td>
                    <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('barangs.show', $barang->id) }}"><i class="bi bi-eye"></i></a>
                        <a class="btn btn-primary" href="{{ route('barangs.edit', $barang->id) }}"><i class="bi bi-pencil-square"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Yakin Ingin Menghapus {{ $barang->nama_barang }} ?')"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $barangs->links() !!}
@endsection
