<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application home site.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('created_at', 'desc')->get();
        $placeholder_questions = Arr::shuffle([
            "Where do you get protein?",
            "Do you miss the taste of meat?",
            "I can’t be vegan because I love to eat good food – do you not like good food?",
            "What about plants – you are killing them too and maybe they feel pain?",
            "You have leather seats in your car and wear leather shoes – why?",
            "Do you drink wine?",
            "Do you drink beer?",
            "Do you eat gluten?"            
        ]);

        return view('home')->with(['questions' => $questions, 'placeholder' => $placeholder_questions[0]]);
    }
}
