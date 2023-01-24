@extends('distributors.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Distributor</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('distributors.create') }}"> Tambah Distributor</a>
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
            <th width="280px">Action</th>
        </tr>
        @foreach ($distributors as $distributor)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $distributor->nama_distributor }}</td>
                <td>{{ $distributor->alamat }}</td>
                <td>{{ $distributor->no_telp }}</td>

                <td>
                    <form action="{{ route('distributors.destroy', $distributor->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('distributors.show', $distributor->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('distributors.edit', $distributor->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah yakin Ingin Menghapus {{ $distributor->nama_distributor }} ?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $distributors->links() !!}
@endsection
