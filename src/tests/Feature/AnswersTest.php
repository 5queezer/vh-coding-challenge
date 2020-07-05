<?php

namespace Tests\Feature;

use App\Answer;
use App\Question;
use Tests\TestCase;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnswersTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() :void {
        parent::setUp();
        
        $q = Question::create(['title' => 'Blue or red pill?']);
        $this->id = $q->id;
        $this->assertCount(1, Question::all());
    }

    /** add an answer */
    public function test_answer_can_be_added()
    {
        $this->withExceptionHandling();
        $response = $this->post("/questions/{$this->id}/answers", [
            'title' => 'Red pill'
        ]);

        $response->assertStatus(302);
        $this->assertCount(1, Answer::all());
    }

    /** validation test */
    public function test_answer_has_min_length() 
    {
        $this->withExceptionHandling();

        $response = $this->post("/questions/{$this->id}/answers", [
            'title' => 'abcd'
        ]);

        $response->assertSessionHasErrors('title');
    }
}
