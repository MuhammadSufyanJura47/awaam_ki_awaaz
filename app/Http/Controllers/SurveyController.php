<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\SurveyAnswer;
use App\Services\SurveyQuestions;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function step1()
    {
        return view('survey.step1');
    }

    public function storeStep1(Request $request)
    {
        $response = Response::create($request->all());

        session(['response_id' => $response->id]);

        return redirect('/survey/step2');
    }

    public function step2()
    {
        $questions = SurveyQuestions::all();
        return view('survey.step2', compact('questions'));
    }

    public function storeStep2(Request $request)
    {
        $responseId = session('response_id');
        
        SurveyAnswer::create([
            'response_id' => $responseId,
            'answers' => $request->answers
        ]);

        session()->forget('response_id');

        return view('survey.success', ['response_id' => $responseId]);
    }

    public function result($id)
    {
        $response = Response::with('answers')->findOrFail($id);
        $questions = SurveyQuestions::all();
        return view('survey.result', compact('response', 'questions'));
    }
}