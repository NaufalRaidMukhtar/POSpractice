@extends('mereks.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
        <br>
            <div class="pull-left">
                <h2>Merek</h2>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button onclick="window.print();" class="btn btn-primary"><i class="bi bi-download"></i> print data </button>
                .
                <a class="btn btn-success" href="{{ route('mereks.create') }}"> Tambah merek</a>
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
            <th>Nama Merek</th>
            <th width="280px"></th>
        </tr>
        @foreach ($mereks as $merek)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $merek->nama_merek }}</td>
                <td>
                    <form action="{{ route('mereks.destroy', $merek->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('mereks.show', $merek->id) }}"><i class="bi bi-eye"></i></a>
                        <a class="btn btn-primary" href="{{ route('mereks.edit', $merek->id) }}"><i class="bi bi-pencil-square"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Yakin Ingin Menghapus {{ $merek->nama_merek }} ?')"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $mereks->links() !!}
@endsection
