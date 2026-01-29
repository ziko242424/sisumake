@extends('layouts.main')

@section('title','Tambah Surat')

@section('content')

<div class="card shadow-sm border-0 p-4 mb-4" 
     style="border-radius: 18px; background: rgba(255,255,255,0.15); backdrop-filter: blur(15px); animation: fadeIn 0.5s ease;">
    <h4 class="text-dark fw-bold mb-4"><i class="fa-solid fa-plus"></i> Tambah Surat Keluar</h4>

    <form method="POST" action="/surat-keluar/simpan" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">No Surat</label>
            <input type="text" name="no_surat" class="form-control" placeholder="Masukkan nomor surat" required style="border-radius:12px; padding:12px;">
        </div>

        <div class="row">
            <div class="mb-3 col-md-6">
                <label class="form-label fw-semibold">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" class="form-control" required style="border-radius:12px; padding:12px;">
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label fw-semibold">Tanggal Kirim</label>
                <input type="date" name="tanggal_kirim" class="form-control" required style="border-radius:12px; padding:12px;">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Tujuan</label>
            <input type="text" name="tujuan" class="form-control" placeholder="Tujuan" required style="border-radius:12px; padding:12px;">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Perihal</label>
            <input type="text" name="perihal" class="form-control" placeholder="Perihal surat" required style="border-radius:12px; padding:12px;">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">File Surat (PDF/JPG)</label>
            <input type="file" name="file_surat" class="form-control" style="border-radius:12px; padding:8px;">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Keterangan</label>
            <textarea name="keterangan" class="form-control" placeholder="Keterangan tambahan..." style="border-radius:12px; padding:12px;" rows="3"></textarea>
        </div>

        <button class="btn btn-success px-4 py-2 shadow-sm">
            <i class="fa-solid fa-floppy-disk"></i> Simpan
        </button>

    </form>
</div>

<style>
    /* Animasi fade-in */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px);}
        to { opacity: 1; transform: translateY(0);}
    }

    /* Hover tombol */
    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        transition: 0.3s;
    }
</style>

@endsection
