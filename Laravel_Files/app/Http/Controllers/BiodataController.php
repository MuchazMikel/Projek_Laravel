<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Biodata;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function biodata()
    {
        $biodata = Biodata::all();
        return view('biodata.index', compact('biodata'));
    }

    public function create()
    {
        return view('biodata.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|max:45',
            'email' => 'required|email|max:100',
            'alamat' => 'required|max:255',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 45 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus valid',
            'email.max' => 'Email maksimal 100 karakter',
            'alamat.required' => 'Alamat wajib diisi',
            'alamat.max' => 'Alamat maksimal 255 karakter',
            'foto.max' => 'Foto maksimal 2 MB',
            'foto.mimes' => 'File ekstensi hanya bisa jpg, png, jpeg, gif, svg',
            'foto.image' => 'File harus berbentuk image',
        ]);

        // Upload Foto
        $fileName = !empty($request->foto) 
            ? 'foto-' . uniqid() . '.' . $request->foto->extension() 
            : 'nophoto.jpg';

        if (!empty($request->foto)) {
            $request->foto->move(public_path('image'), $fileName);
        }

        // Tambah data biodata
        Biodata::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'foto' => $fileName,
        ]);

        return redirect()->route('biodata.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Biodata $biodata)
    {
        return view('biodata.edit', compact('biodata'));
    }

    public function update(Request $request, Biodata $biodata)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|max:45',
            'email' => 'required|email|max:100',
            'alamat' => 'required|max:255',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Simpan foto lama
        $fotoLama = $biodata->foto;

        // Upload Foto Baru Jika Ada
        if ($request->hasFile('foto')) {
            if ($fotoLama !== 'nophoto.jpg' && file_exists(public_path('image/' . $fotoLama))) {
                unlink(public_path('image/' . $fotoLama));
            }
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('image'), $fileName);
        } else {
            $fileName = $fotoLama;
        }

        // Update Data
        $biodata->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'foto' => $fileName,
        ]);

        return redirect()->route('biodata.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Biodata $biodata)
    {
        if ($biodata->foto !== 'nophoto.jpg' && file_exists(public_path('image/' . $biodata->foto))) {
            unlink(public_path('image/' . $biodata->foto));
        }

        $biodata->delete();
        return redirect()->route('biodata.index')->with('success', 'Data berhasil dihapus');
    }
}
