<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\County;
use App\Models\Postalcode;
use App\Exports\Export;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Console;

use Illuminate\Support\Facades\Mail;
use App\Mail\DocumentExportMail;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $this->applyFilters(Postalcode::query(), $request);
        $postalcodes = $query->get();
        $counties = County::all();
        return view('export.index', compact('counties', 'postalcodes'));
    }
    private function applyFilters($query, Request $request)
    {
        if($request->filled('placename')) {
            $query->where('placename', 'like', '%' . $request->input('placename') . '%');
        }
        if($request->filled('code')) {
            $query->where('code', 'like', '%' . $request->input('code') . '%');
        }
        if($request->filled('county_id')) {
            $query->where('county_id', $request->input('county_id'));
        }
        return $query;
    }
    public function csv(Request $request)
    {
        
        $query = $this->applyFilters(Postalcode::query(), $request);
        
        return Excel::download(new Export($query), 'postalcodes.csv', \Maatwebsite\Excel\Excel::CSV);
        
        
    }
    public function pdf(Request $request)
    {
        $query = $this->applyFilters(Postalcode::query(), $request);
        return Excel::download(new Export($query), 'postalcodes.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }

    public function sendPdfEmail(Request $request)
    {

        $query = $this->applyFilters(Postalcode::query(), $request);
        $pdfContent = Excel::raw(new Export($query), \Maatwebsite\Excel\Excel::DOMPDF);
        $userEmail = $request->input('emailaddress');
        
        Mail::to($userEmail)->send(new DocumentExportMail($pdfContent));
        
        return back()->with('success', 'A PDF-et sikeresen elküldtük emailben!');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
