<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Subunit;
class SubunitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dt = Subunit::all();
        return view('Subunit.Subunit',compact('dt'));
        // return Subunit::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataunit = Unit::all();
        return view('Subunit.add-subunit', compact('dataunit'));
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
        Subunit::create([
            'unit_id' => $request->unit_id,
            'namasubunit' => $request->namasubunit,
        ]);

        return redirect('data-subunit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataunit = Unit::all();
        $dtSu = Subunit::findOrFail($id);
        return view('Subunit.edit-subunit',compact('dtSu','dataunit'));
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
            'unit_id' => $request['unit_id'],
            'namasubunit' => $request['namasubunit'],
        ];
        
        $sub=Subunit::findOrFail($id);
        $sub->update($dt);
        return redirect('data-subunit');
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

        $hps = Subunit::findOrFail($id);
        $hps->delete();
        return back();
    }
}
