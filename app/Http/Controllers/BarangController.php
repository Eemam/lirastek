<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'kategoris' => DB::table('kategoris')->get(),
        ];

        return view('barang.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required|unique:barangs',
            'kategori' => 'required',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|integer|min:100',
            'tanggal_masuk' => 'required',
        ];

        $validated = $request->validate($rules);

        Barang::create($validated);
        
        return redirect(route('dashboard'))->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', [
            'barang' => $barang,
            'kategoris' => DB::table('kategoris')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $rules = [
            'nama' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required|min:1',
            'harga' => 'required|min:100',
            'tanggal_masuk' => 'required',
        ];

        if($request->nama != $barang->nama):
            $rules['nama'] = 'required|unique:barangs';
        endif;

        $validated = $request->validate($rules);

        $barang->update($validated);
        $barang->save();

        return redirect(route('dashboard'))->with('success', 'Data berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
