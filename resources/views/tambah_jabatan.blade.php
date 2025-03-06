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
                                <input placeholder="masukan nama jabatan" type="text" name="nama_jabatan"
                                    id="nama_jabatan" class="form-control @error('nama_jabatan') is-invalid @enderror">
                                @error('nama_jabatan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gaji_jabatan" class="form-label">Gaji Jabatan</label>
                                <input placeholder="masukan gaji jabatan" type="number" name="gaji_jabatan"
                                    id="gaji_jabatan" class="form-control @error('gaji_jabatan') is-invalid @enderror">
                                @error('gaji_jabatan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success col-12">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
