<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuizIndexTest extends TestCase
{
    /**
     * @test
     */
    public function index_shows_list_of_quizzes(): void
    {
        $response = $this->get('/');

        $response->assertSee('Hiddekel');
        //$response->assertSeeInOrder(['made', 'garder']);
    }
}
