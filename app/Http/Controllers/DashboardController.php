<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total Surat Masuk
        $totalSuratMasuk = DB::table('surat_masuk')->count();

        // Total Surat Keluar
        $totalSuratKeluar = DB::table('surat_keluar')->count();

        return view('dashboard', compact('totalSuratMasuk', 'totalSuratKeluar'));
    }
}
