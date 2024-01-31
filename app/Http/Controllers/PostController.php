<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        // Retrieve all posts with their corresponding user information
        $posts = Post::with('user')->get();

        // Return a JSON response
        return response()->json(['posts' => $posts], 200);
    }

}