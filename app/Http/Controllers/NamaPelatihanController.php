<?php

namespace App\Http\Controllers;

use App\Models\NamaPelatihan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNamaPelatihanRequest;
use App\Http\Requests\UpdateNamaPelatihanRequest;

class NamaPelatihanController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNamaPelatihanRequest $request)
    {
        $request->validate([
            'nama_pelatihan' => 'required',
        ],[
            'required' => 'Field :attribute tidak boleh kosong',
        ]); 

        NamaPelatihan::create([
            'nama_pelatihan' => $request->nama_pelatihan,
        ]);

        session()->flash('status-sukses', 'data berhasil ditambahkan');
        return redirect('/admin/add-pelatihan');
    }

    /**
     * Display the specified resource.
     */
    public function show(NamaPelatihan $namaPelatihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NamaPelatihan $namaPelatihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNamaPelatihanRequest $request, NamaPelatihan $namaPelatihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NamaPelatihan $namaPelatihan, $id)
    {
        NamaPelatihan::where('id', $id)->delete();

        session()->flash('status-sukses', 'data berhasil dihapus');
        return redirect('/admin/add-pelatihan');
    }
}
