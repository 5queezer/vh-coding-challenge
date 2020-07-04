<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function store() {
        Question::create([
            'title' => request('title')
        ]);
    }
}
