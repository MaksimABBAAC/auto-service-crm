<?php

namespace App\Http\Controllers;
use App\Models\Master;
use Illuminate\Http\Request;

class MastersControlller extends Controller
{
    public function index()
    {
        return view('masters',[
            'masters' => Master::all()
        ]);
    }
    public function show(string $id)
    {
        return view('master',
            ['master' => Master::all()->where('id',$id)->first()
        ]);
    }
}
