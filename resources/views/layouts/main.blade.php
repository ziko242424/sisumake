<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #0f172a;
            margin: 0;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(180deg, #0f172a, #1e293b);
            color: white;
            box-shadow: 5px 0 30px rgba(0,0,0,0.4);
        }

        .sidebar h5 {
            padding: 25px 0;
            text-align: center;
            font-weight: 600;
            letter-spacing: 1px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 25px;
            transition: 0.3s;
            font-size: 15px;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.08);
            color: white;
            padding-left: 35px;
        }

        .sidebar a i {
            width: 22px;
            text-align: center;
        }

        /* ================= CONTENT ================= */
        .content {
            margin-left: 260px;
            padding: 30px;
            min-height: 100vh;
            background: #f1f5f9;
        }

        /* ================= TOPBAR ================= */
        .topbar {
            background: white;
            padding: 18px 25px;
            border-radius: 15px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            animation: slideDown 0.5s ease;
        }

        /* ================= CARD ================= */
        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            animation: fadeIn 0.5s ease;
        }

        /* ================= ANIMATION ================= */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }.table-fixed {
    table-layout: fixed; /* penting supaya kolom tidak ikut menyusut */
    width: 100%;
    word-wrap: break-word; /* teks panjang akan wrap */
}

.table-fixed th, 
.table-fixed td {
    overflow-wrap: break-word; /* memastikan wrap di kolom */
    word-break: break-word;
    white-space: normal; /* teks bisa turun ke baris baru */
}

.table-fixed th:nth-child(1) { width: 50px; }   /* No */
.table-fixed th:nth-child(2) { width: 120px; }  /* No Surat */
.table-fixed th:nth-child(3) { width: 150px; }  /* Pengirim / Tujuan */
.table-fixed th:nth-child(4) { width: 150px; }  /* Perihal */
.table-fixed th:nth-child(5) { width: 100px; }  /* Tanggal Surat */
.table-fixed th:nth-child(6) { width: 100px; }  /* Tanggal Terima / Kirim */
.table-fixed th:nth-child(7) { width: 200px; }  /* Keterangan */
.table-fixed th:nth-child(8) { width: 80px; }   /* File */
.table-fixed th:nth-child(9) { width: 120px; }  /* Aksi */

    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h5>
        <i class="fa-solid fa-folder-open"></i><br>
        SISUMAKE<br>
        <small>Sistem Informasi Surat Masuk dan Keluar</small> 
    </h5>

    <a href="/dashboard">
        <i class="fa-solid fa-chart-line"></i>
        Dashboard
    </a>

    <a href="/surat">
        <i class="fa-solid fa-envelope-open-text"></i>
        Surat Masuk
    </a>
    <a href="/surat-keluar"><i class="fa-solid fa-paper-plane"></i> Surat Keluar</a>

    <a href="/logout">
        <i class="fa-solid fa-right-from-bracket"></i>
        Logout
    </a>
</div>

<!-- CONTENT -->
<div class="content">

    <div class="topbar">
        <div>
            <strong>Admin Kantor Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak</strong><br>
            <strong>Kota Prabumulih</strong><br>
            <small class="text-muted">Sistem Pengarsipan Surat</small>
        </div>

        <div>
            <i class="fa-solid fa-user-shield fa-lg text-secondary"></i>
        </div>
    </div>

    @yield('content')

</div>

</body>
</html>
