@extends('tema')
@section('konten')
    <div class="px-5 py-2 bg-body-tertiary shadow-sm mb-3 hstack">
        <h1 style="font-family: Impact">
            Hai, {{ Auth::user()->name }} Selamat Datang
        </h1>
        <img src="https://placehold.co/400" width="50" class="ms-auto rounded-circle">
    </div>
    <div class="row justify-content-center align-items-center mx-0">
        <div class="col-5">
            <h1 class="text-uppercase fw-bold"><i class="bi bi-calendar-date"></i> Aplikasi Absensi</h1>
            <p class="text-capitalize fw-light display-4">
                Menghitung Absen Semudah Menghitung Hari di Kalender Anda
            </p>
        <a href="{{ url('upload ') }}" class="btn btn-primary"><i class="bi-pen"></i> Absen</a>
        </div>
        <div class="col-5">
            <img class="img-fluid" src="{{ asset('gambar welcome.jpg') }}" alt="">
        </div>
    </div>
@endsection