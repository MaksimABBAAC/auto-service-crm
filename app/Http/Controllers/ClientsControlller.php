<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsControlller extends Controller
{
    public function index()
    {
        return view('clients',[
            'clients' => Client::all()
        ]);
    }
    public function show(string $id)
    {
        return view('client',
            ['client' => Client::all()->where('id',$id)->first()
        ]);
    }
}
