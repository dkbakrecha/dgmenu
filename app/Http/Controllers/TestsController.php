<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Test;
use App\Models\TestAnswer;

use Illuminate\Support\Facades\Auth;

class TestsController extends Controller
{
    public function index()
    {
        // $topics = Topic::inRandomOrder()->limit(10)->get();

        $questions = Question::inRandomOrder()->limit(10)->get();
        //dd($questions);

        /*
        foreach ($topics as $topic) {
            if ($topic->questions->count()) {
                $questions[$topic->id]['topic'] = $topic->title;
                $questions[$topic->id]['questions'] = $topic->questions()->inRandomOrder()->first()->load('options')->toArray();
                shuffle($questions[$topic->id]['questions']['options']);
            }
        }
        */

        return view('tests.create', compact('questions'));
    }

    public function store(Request $request)
    {
        $result = 0;
        //dd(Auth::id());
        $test = Test::create([
            'user_id' => Auth::id(),
            'result'  => $result,
        ]);

        foreach ($request->input('questions', []) as $question) {
            $status = 0;
            $_question_id = $question['id'];
            $_correct_answer = $question['correct'];
            $_answers = $request->input('answers', []);

            if ($_answers[$_question_id] == $_correct_answer) {
                $status = 1;
                $result++;
            }

            TestAnswer::create([
                'user_id'     => Auth::id(),
                'test_id'     => $test->id,
                'question_id' => $_question_id,
                'option_id'   => $_answers[$_question_id],
                'correct'     => $status,
            ]);
        }

        $test->update(['result' => $result]);

        return redirect()->route('results.show', [$test->id]);
    }
}
