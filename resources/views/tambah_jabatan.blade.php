@extends('tema')
@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('/jabatan') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                                <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="gaji_jabatan" class="form-label">Gaji Jabatan</label>
                                <input type="number" name="gaji_jabatan" id="gaji_jabatan" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection