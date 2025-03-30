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
    public function create()
    {
        return view('client_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'second_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|string|max:20|unique:clients,phone'
        ]);

        Client::create($validated);

        return redirect()->route('clients.index')->with('success', 'Клиент успешно создан');
    }
}
