@extends('tema')
@section('konten')
    <div class="card shadow mx-auto mt-3 col-6">
        <div class="card-body">
            <form action="{{ url('upload') }}" enctype="multipart/form-data" method="post">
                @csrf
                <label class="form-label">Upload Foto</label>
                <input type="file" name="avatar" class="form-control">
                <div class="text-end mt-3">
                    <button type="submit" class="btn bg-gradient btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
@endsection