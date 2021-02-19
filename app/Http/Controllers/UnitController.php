<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
class UnitController extends Controller
{
    public function tes(){
        
        $unit = Unit::all();
        return view('Mahasiswa-view', compact('unit'));

    }
}