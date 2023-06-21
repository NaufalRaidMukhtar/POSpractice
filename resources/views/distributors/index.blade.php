 @extends('distributors.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Distributor</h2>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button onclick="window.print();" class="btn btn-primary"><i class="bi bi-download"></i> print data </button>
                .
                <a class="btn btn-success" href="{{ route('distributors.create') }}"> Tambah distributors</a>
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
            <th>Nama Distributor</th>
            <th>Alamat</th>
            <th>No.telp</th>
            <th width="280px"></th>
        </tr>
        @foreach ($distributors as $distributor)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $distributor->nama_distributor }}</td>
                <td>{{ $distributor->alamat }}</td>
                <td>{{ $distributor->no_telp }}</td>

                <td>
                    <form action="{{ route('distributors.destroy', $distributor->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('distributors.show', $distributor->id) }}"><i class="bi bi-eye"></i></a>
                        <a class="btn btn-primary" href="{{ route('distributors.edit', $distributor->id) }}"><i class="bi bi-pencil-square"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah yakin Ingin Menghapus {{ $distributor->nama_distributor }} ?')"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $distributors->links() !!}
@endsection
