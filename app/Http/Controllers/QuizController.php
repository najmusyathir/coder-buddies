<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Result;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function quizHtml()
    {
        $quiz = json_decode(file_get_contents(resource_path('data/quizHtml.json')), true);
        return view("quiz.html", compact("quiz"));
    }

    public function quizCss()
    {
        $quiz = json_decode(file_get_contents(resource_path('data/quizCss.json')), true);
        return view("quiz.css", compact("quiz"));
    }

    public function submitTest()
    {
        $result = new Result();
        $result->answers = "test data";
        $result->score = 10.1;
        $result->duration = 10020;
        $result->user_id = 01;
        $result->save();

        return redirect()->route('quiz.index');
    }

    public function submit(Request $request)
    {
        // Load quiz data
        if ($request->input('type') == 'html') {
            $jsonFile = resource_path('data/quizHtml.json');
        } else {
            $jsonFile = resource_path('data/quizCss.json');
        }
        $quizData = json_decode(file_get_contents($jsonFile), true);

        // Get submitted answers as array (e.g. ["A", "B", ...])
        $submittedAnswers = json_decode($request->input('answers'), true) ?? [];

        $totalQuestions = count($quizData);
        $correctAnswers = 0;

        // Check each answer by index
        foreach ($quizData as $index => $question) {
            if (isset($submittedAnswers[$index]) && $submittedAnswers[$index] === $question['answer']) {
                $correctAnswers++;
            }
        }

        $score = $totalQuestions > 0 ? round($correctAnswers / $totalQuestions, 2) : 0;

        // Save result
        $result = new Result();
        $result->answers = json_encode($submittedAnswers);
        $result->type = $request->input('type');
        $result->score = $score;
        $result->duration = max(0, (int) $request->input('duration', 0));
        $result->user_id = Auth::id() ?? 0;
        $result->save();

        return redirect()->route('quiz.index')->with('success', "Quiz submitted! Your score: " . ($score * 100) . "%");
    }



}
