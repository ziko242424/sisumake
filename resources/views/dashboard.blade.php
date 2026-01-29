@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <h3 class="mb-1">📊 Dashboard</h3>
    <p class="text-muted">Sistem Arsip Surat Masuk dan Keluar Internal Kantor</p>

    <div class="row mt-4 g-4">
        <!-- Total Surat Masuk -->
        <div class="col-md-6">
            <div class="card shadow-lg rounded-4" style="background: linear-gradient(135deg, #4f46e5, #6366f1); color:white;">
                <div class="card-body text-center">
                    <h6 class="text-light mb-2">Total Surat Masuk</h6>
                    <h2 class="fw-bold">{{ $totalSuratMasuk }}</h2>
                    <i class="fas fa-inbox fa-2x mt-2"></i>
                </div>
            </div>
        </div>

        <!-- Total Surat Keluar -->
        <div class="col-md-6">
            <div class="card shadow-lg rounded-4" style="background: linear-gradient(135deg, #16a34a, #4ade80); color:white;">
                <div class="card-body text-center">
                    <h6 class="text-light mb-2">Total Surat Keluar</h6>
                    <h2 class="fw-bold">{{ $totalSuratKeluar }}</h2>
                    <i class="fas fa-paper-plane fa-2x mt-2"></i>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
