<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\PDF as PDFModel;
use App\Models\File;

class PDFEditorController extends Controller
{
    public function showUploadForm()
    {
        // Return the view for the PDF upload form
        return view('pdf.upload');
    }
    public function edit($id)
    {
        $file = File::findOrFail($id);
        return view('pdf.edit',compact('file'));
    }


   

    public function save(Request $request, $id)
    {
        // Retrieve the PDF model by ID
        $pdf = PDFModel::findOrFail($id);

        // Perform the PDF editing logic
        // ...

        // Save the edited PDF
        $pdf->save();

        // Redirect to the PDF editing form with a success message
        return redirect()->back()->with('success', 'PDF saved successfully.');
    }

    public function download($id)
    {
        // Retrieve the PDF model by ID
        $pdf = PDFModel::findOrFail($id);

        // Generate the PDF file for download
        $pdfData = PDF::loadView('pdf.download', compact('pdf'))->output();

        // Set the appropriate headers for downloading the file
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="edited_pdf.pdf"',
        ];

        // Return the PDF file as a download response
        return response($pdfData, 200, $headers);
    }
}