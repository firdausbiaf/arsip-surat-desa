<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Http\Requests\StoreSuratRequest;
use App\Http\Requests\UpdateSuratRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $surats = Surat::with('kategori')
                        ->where('judul', 'like', "%$search%")
                        ->get();

        return view('surat.index', compact('surats', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('surat.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSuratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuratRequest $request)
    {
        $request->validate([
            'nomor' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string',
            'file' => 'required|mimes:pdf|max:2048',
        ]);
    
        $filePath = $request->file('file')->store('public/surat_files');
    
        Surat::create([
            'nomor' => $request->nomor,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'file' => $filePath,
        ]);
    
        return redirect()->route('surat.index')
            ->with('success', 'Surat berhasil diarsipkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show(Surat $surat)
    {
        $file = Storage::path($surat->file);

        // Ambil isi file sebagai blob
        $fileContents = file_get_contents($file);

        // Ambil tipe MIME dari file
        $mimeType = mime_content_type($file);

        // Tampilkan view show.blade.php dengan data yang diperlukan
        return view('surat.show', [
            'surat' => $surat,
            'fileContents' => $fileContents,
            'mimeType' => $mimeType
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit(Surat $surat)
    {
        $kategoris = Kategori::all();
        return view('surat.edit', compact('surat', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuratRequest  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuratRequest $request, Surat $surat)
    {
        $request->validate([
            'nomor' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);
    
        $data = [
            'nomor' => $request->nomor,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
        ];
    
        if ($request->hasFile('file')) {
            Storage::delete($surat->file);
            $data['file'] = $request->file('file')->store('public/surat_files');
        }
    
        $surat->update($data);
    
        return redirect()->route('surat.index')
            ->with('success', 'Surat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat $surat)
    {
        Storage::delete($surat->file);
        $surat->delete();

        return redirect()->route('surat.index')
            ->with('success', 'Surat berhasil dihapus.');
    }

    public function download(Surat $surat)
    {
        $file = Storage::path($surat->file);
        $fileName = $surat->judul . '.pdf'; // Menggunakan judul sebagai nama file
    
        return response()->download($file, $fileName, [], 'inline');
    }
    
}
