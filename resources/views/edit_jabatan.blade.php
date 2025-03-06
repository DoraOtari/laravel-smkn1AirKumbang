@extends('tema')
@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Jabatan</h4>
                        <form action='{{ url("/jabatan/$jabatan->id") }}' method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                                <input value="{{ $jabatan->nama_jabatan }}" placeholder="masukan nama jabatan" type="text" name="nama_jabatan" id="nama_jabatan" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="gaji_jabatan" class="form-label">Gaji Jabatan</label>
                                <input value="{{ $jabatan->gaji_jabatan }}" placeholder="masukan gaji jabatan" type="number" name="gaji_jabatan" id="gaji_jabatan" class="form-control">
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