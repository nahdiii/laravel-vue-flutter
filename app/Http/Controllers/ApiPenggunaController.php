<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiPenggunaController extends Controller
{
    public function store(Request $request)
    {
          $request->validate([
            'name'    => 'required|string|min:2|max:30',
            'level'    => 'required|string|max:10',
            'tgllahir' => 'required|date',
            'email'    => 'required|string|email|max:35|email',
            'password'    => 'required|string|max:191',
        ]);

        return "a";
    }
}
