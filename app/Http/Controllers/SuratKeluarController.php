<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratKeluarController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $query = DB::table('surat_keluar');

        if ($keyword) {
            $query->where('no_surat','like',"%$keyword%")
                  ->orWhere('tujuan','like',"%$keyword%")
                  ->orWhere('perihal','like',"%$keyword%");
        }

        // urutkan id naik -> terbaru di bawah
        $surat = $query->orderBy('id','asc')->get();

        return view('surat-keluar.index', compact('surat','keyword'));
    }

    public function create()
    {
        return view('surat-keluar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_surat'=>'required|unique:surat_keluar',
            'tanggal_surat'=>'required',
            'tanggal_kirim'=>'required',
            'tujuan'=>'required',
            'perihal'=>'required',
            'file_surat'=>'nullable|mimes:pdf,jpg,jpeg,png',
        ]);

        $fileName = null;
        if($request->hasFile('file_surat')){
            $file = $request->file('file_surat');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('files/surat_keluar'), $fileName);
        }

        DB::table('surat_keluar')->insert([
            'no_surat'=>$request->no_surat,
            'tanggal_surat'=>$request->tanggal_surat,
            'tanggal_kirim'=>$request->tanggal_kirim,
            'tujuan'=>$request->tujuan,
            'perihal'=>$request->perihal,
            'file_surat'=>$fileName,
            'keterangan'=>$request->keterangan,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        return redirect('/surat-keluar')->with('success','Surat keluar berhasil ditambahkan');
    }

    public function edit($id)
    {
        $surat = DB::table('surat_keluar')->where('id',$id)->first();
        return view('surat-keluar.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $surat = DB::table('surat_keluar')->where('id',$id)->first();

        $request->validate([
            'no_surat'=>'required|unique:surat_keluar,no_surat,'.$id,
            'tanggal_surat'=>'required',
            'tanggal_kirim'=>'required',
            'tujuan'=>'required',
            'perihal'=>'required',
            'file_surat'=>'nullable|mimes:pdf,jpg,jpeg,png',
        ]);

        $fileName = $surat->file_surat;

        if($request->hasFile('file_surat')){
            if($fileName && file_exists(public_path('files/surat_keluar/'.$fileName))){
                unlink(public_path('files/surat_keluar/'.$fileName));
            }
            $file = $request->file('file_surat');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('files/surat_keluar'), $fileName);
        }

        DB::table('surat_keluar')->where('id',$id)->update([
            'no_surat'=>$request->no_surat,
            'tanggal_surat'=>$request->tanggal_surat,
            'tanggal_kirim'=>$request->tanggal_kirim,
            'tujuan'=>$request->tujuan,
            'perihal'=>$request->perihal,
            'file_surat'=>$fileName,
            'keterangan'=>$request->keterangan,
            'updated_at'=>now()
        ]);

        return redirect('/surat-keluar')->with('success','Surat keluar berhasil diupdate');
    }

    public function destroy($id)
    {
        $surat = DB::table('surat_keluar')->where('id',$id)->first();

        if($surat->file_surat && file_exists(public_path('files/surat_keluar/'.$surat->file_surat))){
            unlink(public_path('files/surat_keluar/'.$surat->file_surat));
        }

        DB::table('surat_keluar')->where('id',$id)->delete();

        return redirect('/surat-keluar')->with('success','Surat keluar berhasil dihapus');
    }

    public function preview($id)
    {
        $surat = DB::table('surat_keluar')->where('id',$id)->first();

        return response()->file(public_path('files/surat_keluar/'.$surat->file_surat));
    }
}
