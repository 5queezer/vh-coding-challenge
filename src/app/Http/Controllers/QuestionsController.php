<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function store() {
        $data = request()->validate([
            'title' => array('required', 'min:5', 'regex:/\?$/u')
        ]);
        Question::create([
            'title' => request('title')
        ]);
    }
}
