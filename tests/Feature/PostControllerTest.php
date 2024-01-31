<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPostsSortedInDescendingOrder()
    {
        // Seed the db with fake posts
        $this->seed();

        // API endpoiint
        $response = $this->get('/posts');


        // Extract the `id` values from the response
        $responseData = $response->json();
        $responseIds = collect($responseData['posts'])->pluck('id')->toArray();

        // Ensure the `id` values are in descending order
        $expectedOrder = Post::orderByDesc('id')->pluck('id')->toArray();
        $this->assertSame($expectedOrder, $responseIds);
    }
}
