<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\SurveyQuestions;


class AdminController extends Controller
{
    // PDF Export
    public function exportPDF($id)
    {
        $response = Response::with('answers')->findOrFail($id);
        $questions = SurveyQuestions::all();

        $pdf = Pdf::loadView('admin.pdf', compact('response', 'questions'));

        return $pdf->download('response.pdf');
    }

    // Dashboard (all responses)
    public function dashboard()
    {
        $responses = Response::with('answers')->latest()->paginate(10);
        return view('admin.dashboard', compact('responses'));
    }

    // Single response view
    public function show($id)
    {
        $response = Response::with('answers')->findOrFail($id);
        $questions = SurveyQuestions::all();
        return view('admin.show', compact('response', 'questions'));
    }

    // Delete response
    public function destroy($id)
    {
        $response = Response::findOrFail($id);
        $response->answers()->delete();
        $response->delete();
        
        return redirect('/admin')->with('success', 'Response deleted successfully.');
    }

    // CSV Export
    public function exportCSV()
    {
        $responses = Response::with('answers')->get();

        $filename = "survey_data.csv";
        $file = fopen($filename, 'w');

        // headings
        fputcsv($file, [
            'Age','Gender','Education','Occupation',
            'Tech Usage','AI Usage','Civic Participation','Answers'
        ]);

        foreach ($responses as $r) {
            fputcsv($file, [
                $r->age_group,
                $r->gender,
                $r->education,
                $r->occupation,
                $r->tech_usage,
                $r->ai_usage,
                $r->civic_participation,
                json_encode($r->answers->answers ?? [])
            ]);
        }

        fclose($file);

        return response()->download($filename)->deleteFileAfterSend();
    }
}