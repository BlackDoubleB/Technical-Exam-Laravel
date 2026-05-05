<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(SearchPostRequest $request, PostService $postService)
    {
        return response()->json($postService->searchPost($request));
    }

    function store(StorePostRequest $request, PostService $postService)
    {
        $postCreated = $postService->createdPost($request);

        return response()->json([
            'message' => 'Post created successfully',
            'post' => $postCreated
        ], 201);
    }

    function show(string $id, PostService $postService)
    {
        $postId = $postService->searchPostId($id);
        return response()->json($postId);
    }

    function update(UpdatePostRequest $request, int $id, PostService $postService)
    {
        $post = $postService->updatePost($id, $request);

        return response()->json([
            'message' => 'Updated post',
            'data' => $post
        ]);
    }

    function destroy(int $id, PostService $postService)
    {
        $postService->deletePost($id);

        return response()->json([
            'message' => 'Post deleted'
        ]);
    }
}
