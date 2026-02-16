<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\County;
use App\Models\Postalcode;

class PostalcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postalcodes = Postalcode::all();
        return view('postalcodes.index', compact('postalcodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $counties = County::all();
        return view('postalcodes.create', compact('counties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'code' => 'required|integer|digits:4',
                'placename' => 'required|string|max:100|min:3',
                'county_id' => 'nullable|exists:counties,id',
            ],
            [
                'code.required' => 'A irányítószám kötelező mező.',
                'code.integer' => 'Az irányítószámnak egész számnak kell lennie.',
                'code.digits' => 'Az irányítószámnak pontosan 4 számjegyből kell állnia.',
                'placename.required' => 'A helynév kötelező mező.',
                'placename.string' => 'A helynévnek szöveges értéknek kell lennie.',
                'placename.max' => 'A helynév nem lehet hosszabb 100 karakternél.',
                'county_id.exists' => 'A megadott megye érvénytelen.',
            ]
        );
        Postalcode::create($request->all());
        return redirect()->route('postalcodes.index')->with('success', 'Postal code created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $postalcode = Postalcode::findOrFail($id);
        return view('postalcodes.show', compact('postalcode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $postalcode = Postalcode::findOrFail($id);
        $counties = County::all();
        return view('postalcodes.edit', compact('postalcode', 'counties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate(
            [
                'placename' => 'required|string|max:100|min:3',
                'code' => 'required|integer|digits:4',
                'county_id' => 'nullable|exists:counties,id',
            ],
            [
                'placename.required' => 'A helynév kötelező mező.',
                'placename.string' => 'A helynévnek szöveges értéknek kell lennie.',
                'placename.max' => 'A helynév nem lehet hosszabb 100 karakternél.',
                'placename.min' => 'A helynév legalább 3 karakterből kell álljon.',
                'code.required' => 'Az irányítószám kötelező mező.',
                'code.integer' => 'Az irányítószámnak egész számnak kell lennie.',
                'code.digits' => 'Az irányítószámnak pontosan 4 számjegyből kell állnia.',
                'county_id.exists' => 'A megadott megye érvénytelen.',
            ]
        );
        $postalcode = Postalcode::findOrFail($id);
        $postalcode->update($request->all());
        return redirect()->route('postalcodes.index')->with('success', 'Postal code updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $postalcode = Postalcode::findOrFail($id);
        $postalcode->delete();
        return redirect()->route('postalcodes.index')->with('success', 'Postal code deleted successfully.');
    }
}
