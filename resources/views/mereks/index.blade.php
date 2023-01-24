@extends('mereks.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Merek</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('mereks.create') }}"> Tambah Merek</a>
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
            <th>Nama Merek</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($mereks as $merek)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $merek->nama_merek }}</td>
                <td>
                    <form action="{{ route('mereks.destroy', $merek->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('mereks.show', $merek->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('mereks.edit', $merek->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Yakin Ingin Menghapus {{ $merek->nama_merek }} ?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $mereks->links() !!}
@endsection
