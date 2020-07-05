<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class QuestionsController extends Controller
{
    public function store() {
        request()->validate([
            'title' => array('required', 'min:5', 'regex:/\?$/u')
        ]);
        Question::create([
            'title' => request('title')
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $question = Question::find($id);
      $answers = $question->answers->sortBy('created_at');
      return view('questions.show')->with(['question' => $question, 'answers' => $answers]);
    }
}
