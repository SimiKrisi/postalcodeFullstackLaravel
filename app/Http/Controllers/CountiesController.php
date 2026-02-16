<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\County;

class CountiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $counties = County::all();
        return view('counties.index', compact('counties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('counties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate(
            ['name' => 'required|string|max:50',],
            ['name.required' => 'A megye neve kötelező mező.',]

        );
        $county = new County();
        $county->name = $request->input('name');
        $county->save();
        return redirect()->route('counties.index')->with('success', 'County created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $county = County::findOrFail($id);
        return view('counties.show', compact('county'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $county = County::findOrFail($id);
        return view('counties.edit', compact('county'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate(
            ['name' => 'required|string|max:50',],
            ['name.required' => 'A megye neve kötelező mező.',]

        );
        $county = County::findOrFail($id);
        $county->name = $request->name;
        $county->save();
        return redirect()->route('counties.index')->with('success', 'County updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $county = County::findOrFail($id);
        $county->delete();
        return redirect()->route('counties.index')->with('success', 'County deleted successfully.');
    }
}
