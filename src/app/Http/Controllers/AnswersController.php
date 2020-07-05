<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use App\Rules\QuestionExists;

class AnswersController extends Controller
{
    public function store($question_id) {
        request()->validate([
            'title' => array('required', 'min:5')
        ]);
        Answer::create([
            'title' => request('title'),
            'question_id' => (int) $question_id
        ]);
    }
}
