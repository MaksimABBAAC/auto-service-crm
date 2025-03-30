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
    public function create()
    {
        return view('works_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:works',
            'cost' => 'required|numeric|min:0'
        ]);

        Work::create([
            'name' => $validated['name'],
            'cost' => $validated['cost']
        ]);

        return redirect()->route('works.index')
            ->with('success', 'Работа успешно добавлена');
    }

}
