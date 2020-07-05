<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionTest extends TestCase
{
    use RefreshDatabase;
    /** add a question */
    public function test_question_can_be_added()
    {
        $this->withExceptionHandling();
        $response = $this->post('/questions', [
            'title' => 'Why are women so complicated?'
        ]);

        $response->assertStatus(302);
        $this->assertCount(1, Question::all());
    }

    /** validation test */
    public function test_question_is_required() 
    {
        $this->withExceptionHandling();

        $response = $this->post('/questions', [
            'title' => ''
        ]);

        $response->assertSessionHasErrors('title');
    }

    /** validation test */
    public function test_question_has_min_length() 
    {
        $this->withExceptionHandling();

        $response = $this->post('/questions', [
            'title' => 'abcd'
        ]);

        $response->assertSessionHasErrors('title');
    }

    /** validation test */
    public function test_question_ends_with_question_mark() 
    {
        $this->withExceptionHandling();

        $response = $this->post('/questions', [
            'title' => 'No question mark'
        ]);

        $response->assertSessionHasErrors('title');
    }

}
