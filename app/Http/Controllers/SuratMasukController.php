<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratMasukController extends Controller
{
    public function index(Request $request)
{
    $keyword = $request->keyword;

    $surat = DB::table('surat_masuk')
        ->when($keyword, function ($query, $keyword) {
            $query->where('no_surat', 'like', "%$keyword%")
                  ->orWhere('pengirim', 'like', "%$keyword%")
                  ->orWhere('perihal', 'like', "%$keyword%");
        })
        ->orderBy('id', 'asc')
        ->get();

    return view('surat-masuk.index', compact('surat', 'keyword'));
}

    public function create()
    {
        return view('surat-masuk.create');
    }

    public function store(Request $request)
    {
        $fileName = null;

        if ($request->hasFile('file_surat')) {
            $fileName = time() . '.' . $request->file_surat->extension();
            $request->file_surat->move(public_path('uploads'), $fileName);
        }

        DB::table('surat_masuk')->insert([
            'no_surat' => $request->no_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tanggal_terima' => $request->tanggal_terima,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'file_surat' => $fileName,
            'keterangan' => $request->keterangan,
            'created_at' => now(),
        ]);

        return redirect('/surat')->with('success', 'Surat berhasil disimpan');
    }

    public function edit($id)
{
    $surat = DB::table('surat_masuk')->where('id', $id)->first();
    return view('surat-masuk.edit', compact('surat'));
}

public function update(Request $request, $id)
{
    $fileName = $request->old_file;

    if ($request->hasFile('file_surat')) {
        $fileName = time() . '.' . $request->file_surat->extension();
        $request->file_surat->move(public_path('uploads'), $fileName);
    }

    DB::table('surat_masuk')->where('id', $id)->update([
        'no_surat' => $request->no_surat,
        'tanggal_surat' => $request->tanggal_surat,
        'tanggal_terima' => $request->tanggal_terima,
        'pengirim' => $request->pengirim,
        'perihal' => $request->perihal,
        'file_surat' => $fileName,
        'keterangan' => $request->keterangan,
        'updated_at' => now(),
    ]);

    return redirect('/surat')->with('success', 'Surat berhasil diperbarui');
}

public function destroy($id)
{
    DB::table('surat_masuk')->where('id', $id)->delete();
    return redirect('/surat')->with('success', 'Surat berhasil dihapus');
}

}
