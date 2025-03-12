@extends('tema')
@section('konten')
<div class="col-6 mx-auto mt-3" >
    @if (session('pesan'))
    <div class="alert alert-primary" role="alert">
        <i class="bi-bell"></i> {{ session('pesan') }}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Data Jabatan</h3>
            <form action="{{ url('jabatan') }}" method="get">
                <div class="hstack col-6 float-end">
                    <input value="{{ request('keyword') }}" type="search" name="keyword" class="form-control me-2" placeholder="Cari jabatan">
                    <button type="submit" class="btn btn-warning"><i class="bi-search"></i></button>
                </div>
            </form>
            <a href="{{ url('jabatan/tambah') }}" class="btn btn-success">
                Tambah
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Jabatan</th>
                        <th>Gaji Jabatan</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jabatan as $item)
                    <tr>
                        <td>{{ $item->nama_jabatan }}</td>
                        <td>Rp. {{ number_format($item->gaji_jabatan,0,',','.') }}</td>
                        <td><a class="btn btn-primary" href='{{ url("jabatan/$item->id/edit") }}'><i class="bi-pen"></i></a></td>
                        <td>
                            <form action="{{ url('jabatan/'.$item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{ $jabatan->links() }}
        </div>
    </div>
</div>    
@endsection