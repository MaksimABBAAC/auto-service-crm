<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorksControlller extends Controller
{
    public function index()
    {
        return view('works',[
            'works' => Work::all()
        ]);
    }
}
