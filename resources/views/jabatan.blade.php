@extends('tema')
@section('konten')
<div class="col-6" >
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Data Jabatan</h3>
            <a href="{{ url('jabatan/tambah') }}" class="btn btn-primary">
                Tambah
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Jabatan</th>
                        <th>Gaji Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>    








@endsection