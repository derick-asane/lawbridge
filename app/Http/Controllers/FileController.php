<?php

namespace App\Http\Controllers;

use App\Models\file;
use Illuminate\Http\Request;
use App\Models\mycase;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getPdfForm(Mycase $mycase)
    {
        return view('client.uploadpdf', compact('mycase'));
    }

    public function storePdfForm(Request $request , $mycase_id)
    {
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:2048', // 2048 = 2MB
        ]);

            // Store the uploaded file
        $pdfFile = $request->file('pdf_file');
        $fileName = time() . '_' . $pdfFile->getClientOriginalName();
        $filePath = $pdfFile->storeAs('pdfs', $fileName, 'public');

            // Store the file path in your database
        $pdf = new file();
        $pdf->file_path = $filePath;
        $pdf->file_type = 'pdf';
        $pdf->mycase_id =  $mycase_id;
        $pdf->save();

        return redirect()->back()->with('success', 'PDF file uploaded successfully!');
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
    public function show(file $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(file $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, file $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(file $file)
    {
        //
    }
}
