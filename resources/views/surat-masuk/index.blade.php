@extends('layouts.main')

@section('title','Surat Masuk')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="text-dark fw-bold"><i class="fa-solid fa-envelope-open-text"></i> Arsip Surat Masuk</h4>
    <a href="/surat/tambah" class="btn btn-primary shadow-sm">
        <i class="fa-solid fa-plus"></i> Tambah Surat
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- SEARCH -->
<div class="card mb-4 shadow-sm border-0 p-3" style="border-radius: 18px; background: #ffffff;">
    <form method="GET" action="/surat" class="row g-3">
        <div class="col-md-8">
            <input 
                type="text" 
                name="keyword" 
                value="{{ $keyword ?? '' }}"
                class="form-control"
                placeholder="Cari nomor surat / pengirim / perihal"
                style="border-radius:12px; padding:12px;">
        </div>
        <div class="col-md-4">
            <button class="btn btn-secondary w-100" style="border-radius:12px;">
                <i class="fa-solid fa-magnifying-glass"></i> Cari
            </button>
        </div>
    </form>
</div>

<!-- TABLE -->
<div class="card shadow-sm border-0 p-3" style="border-radius: 18px; background: #ffffff;">
    <div class="table-responsive">
        <table class="table table-bordered align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>No Surat</th>
                    <th>Pengirim</th>
                    <th>Perihal</th>
                    <th>Tanggal Surat</th>
                    <th>Tanggal Terima</th>
                    <th>Keterangan</th>
                    <th>File</th>
                    <th style="width: 90px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($surat as $s)
                <tr style="transition: all 0.2s ease;">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $s->no_surat }}</td>
                    <td>{{ $s->pengirim }}</td>
                    <td>{{ $s->perihal }}</td>
                    <td>{{ \Carbon\Carbon::parse($s->tanggal_surat)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($s->tanggal_terima)->format('d M Y') }}</td>
                    <td>{{ $s->keterangan ?? '-' }}</td>
                    <td>
                        @if($s->file_surat)
                        <a href="/surat/preview/{{ $s->id }}" class="btn btn-sm btn-info shadow-sm">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="/surat/edit/{{ $s->id }}" class="btn btn-sm btn-warning shadow-sm">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="/surat/hapus/{{ $s->id }}" 
                        class="btn btn-sm btn-danger shadow-sm"
                        onclick="return confirm('Yakin ingin menghapus surat ini?')">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    /* Hover row */
    tbody tr:hover {
        background: #f1f1f1;
        transform: translateY(-2px);
    }

    /* Tombol hover */
    .btn-primary:hover, .btn-warning:hover, .btn-info:hover, .btn-danger:hover, .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        transition: 0.3s;
    }

    /* Animasi fade-in card */
    .card {
        animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px);}
        to { opacity: 1; transform: translateY(0);}
    }
</style>

@endsection
