<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubmissionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_submission_endpoint()
    {
        $response = $this->postJson('/api/submit', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ]);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Submission received. It will be processed shortly.']);
    }

    public function test_submission_endpoint_validation()
    {
        $response = $this->postJson('/api/submit', [
            'name' => '',
            'email' => 'invalid-email',
            'message' => '',
        ]);

        $response->assertStatus(422)
                 ->assertJsonStructure(['error']);
    }
}
