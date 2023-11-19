<?php

namespace App\Http\Controllers;

use App\Models\Suratkeluar;
use Illuminate\Http\Request;
use App\Imports\SuratkeluarImport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SuratkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Suratkeluar::all();
        return view('suratkeluar.index',compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suratkeluar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tglsurat'=>'required',
            'tglkeluar'=>'required',
            'nosurat'=>'required',
            'tujuan'=>'required',
            'isi'=>'required',
            'file'=>'required|mimes:pdf|max:10000'
        ],
        [
            'tglsurat.required'=>'Kolom Tanggal Surat tidak boleh kosong',
            'tglkeluar.required'=>'Kolom Tanggal Keluar tidak boleh kosong',
            'nosurat.required'=>'Kolom No. Surat tidak boleh kosong',
            'tujuan.required'=>'Kolom Tujuan tidak boleh kosong',
            'isi.required'=>'Kolom Isi Ringkas tidak boleh kosong',
            'file.required'=>'Silahkan pilih file surat',
            'file.mimes'=>'Tipe File harus PDF',
            'file.max'=>'Ukuran file tidak boleh dari 10 MB',
        ]);

        if ($request->hasFile('file')) {
            $fileSurat = $request->file('file');
            $newName = 'SRK' . date('Ymd') . '.' . rand() . '.' . 
            $fileSurat->getClientOriginalExtension();
            $fileSurat->storeAs('public/suratkeluar/', $newName);
        }
        $simpan = Suratkeluar::create([
            'tgl_surat'=>$request->tglsurat,
            'tgl_keluar'=>$request->tglkeluar,
            'no_surat'=>$request->nosurat,
            'tujuan'=>$request->tujuan,
            'ringkasan'=>$request->isi,
            'file_surat'=>$newName,
        ]);

        $simpan->save();

        return redirect()->route('suratkeluars.index')->with('success','Data Surat Keluar sudah berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Suratkeluar $suratkeluar)
    {
        return view('suratkeluar.show',compact('suratkeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suratkeluar $suratkeluar)
    {

        return view('suratkeluar.edit',compact('suratkeluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suratkeluar $suratkeluar)
    {
        $request->validate([
            'tglsurat'=>'required',
            'tglkeluar'=>'required',
            'nosurat'=>'required',
            'tujuan'=>'required',
            'isi'=>'required',
            'file'=>'mimes:pdf|max:10000'
        ],
        [
            'tglsurat.required'=>'Kolom Tanggal Surat tidak boleh kosong',
            'tglkeluar.required'=>'Kolom Tanggal Keluar tidak boleh kosong',
            'nosurat.required'=>'Kolom No. Surat tidak boleh kosong',
            'tujuan.required'=>'Kolom Tujuan tidak boleh kosong',
            'isi.required'=>'Kolom Isi Ringkas tidak boleh kosong',
            'file.required'=>'Silahkan pilih file surat',
            'file.mimes'=>'Tipe File harus PDF',
            'file.max'=>'Ukuran file tidak boleh dari 10 MB',
        ]);

        $filesurat = $request->file('file');

        $suratkeluar->no_surat = $request->nosurat;
        $suratkeluar->tgl_surat = $request->tglsurat;
        $suratkeluar->tgl_keluar = $request->tglkeluar;
        $suratkeluar->tujuan = $request->tujuan;
        $suratkeluar->ringkasan = $request->isi;


        if ($filesurat != '') {
            $new_name = 'SRK' . date('Ymd') . '.' . rand() . '.' . $filesurat->extension();
            $filesurat->storeAs('public/suratkeluar/', $new_name);
            // Hapus file lama jika ada
            $oldFilePath = 'storage/suratkeluar/' . $suratkeluar->file_surat;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            $suratkeluar->file_surat = $new_name;
        }
        $suratkeluar->save();

        return redirect()->route('suratkeluars.index')->with('success','Ubah Surat Keluar sudah berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suratkeluar $suratkeluar)
    {
        // menghapus record terpilih
        $suratkeluar->delete();

        // Hapus file dari folder storage public
        Storage::delete('public/suratkeluar/' . $suratkeluar->file_surat);

        return redirect()
            ->route('suratkeluars.index')
            ->with('success', 'Data Surat Keluar sudah berhasil dihapus');
    }


    public function import()
    {
        return view('suratkeluar.import');
    }

    public function importproses(Request $request)
    {
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx',
		]);
 
		Excel::import(new SuratkeluarImport, $request->file('file'));
        
        return redirect()->route('suratkeluars.index')->with('success','Import data berhasil');
 
    }

    public function exportpdf()
    {
    	$query = Suratkeluar::all();
 
    	$pdf = PDF::loadview('suratkeluar.suratkeluar_pdf',['query'=>$query]);
    	return $pdf->download('laporan-suratkeluar.pdf');
    }
}
