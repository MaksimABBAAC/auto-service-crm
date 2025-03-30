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
    public function create()
    {
        return view('master_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'second_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:masters,email',
            'phone' => 'required|string|max:20|unique:masters,phone'
        ]);

        Master::create($validated);

        return redirect()->route('masters.index')->with('success', 'Мастер успешно создан');
    }
}
