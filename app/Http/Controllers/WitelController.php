<?php

namespace App\Http\Controllers;

use App\Models\Witel;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWitelRequest;
use App\Http\Requests\UpdateWitelRequest;

class WitelController extends Controller
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
    public function store(StoreWitelRequest $request)
    {
        $request->validate([
            'witel' => 'required',
        ],[
            'required' => 'Field :attribute tidak boleh kosong',
        ]); 

        Witel::create([
            'witel' => $request->witel,
        ]);

        session()->flash('status-sukses', 'data berhasil ditambahkan');
        return redirect('/admin/add-witel');
    }

    /**
     * Display the specified resource.
     */
    public function show(Witel $witel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Witel $witel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWitelRequest $request, Witel $witel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Witel $witel, $id)
    {
        Witel::where('id', $id)->delete();

        session()->flash('status-sukses', 'data berhasil dihapus');
        return redirect('/admin/add-witel');
    }
}
