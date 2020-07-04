<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    public function test_a_question_can_be_added()
    {
        $this->withExceptionHandling();
        $response = $this->post('/questions', [
            'title' => 'Why are women so complicated?'
        ]);

        $response->assertOk();
        
    }
}
