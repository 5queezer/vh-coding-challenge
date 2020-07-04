<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function store() {
        $data = request()->validate([
            'title' => 'required|min:5'
        ]);
        Question::create([
            'title' => request('title')
        ]);
    }
}
