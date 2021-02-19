<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = Mahasiswa::all();
        
        return view('Mahasiswa.Mahasiswa-view', compact('mhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $kategori = Kategori::with('user')->get();
        // return view('Mahasiswa.Mahasiswa-add',compact('kategori'));
        return view('Mahasiswa.Mahasiswa-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Mahasiswa::create([
            'nama' => $request->nama,
            'telp' => $request->telp
        ]);
        return redirect('show-mhs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        return view('Mahasiswa.Mahasiswa-edit',compact('mhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dt=[
            'nama' => $request['nama'],
        ];
        
        $mhs =Mahasiswa::findOrFail($id);
        $mhs->update($dt);
        return redirect('show-mhs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->delete();
        return back();
    }
}
