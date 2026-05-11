<?php

namespace App\Http\Controllers;

use App\DTOs\CreatePostDTO;
use App\Http\Requests\SearchPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Services\PostService;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    function index(SearchPostRequest $request, PostService $postService)
    {
        return response()->json($postService->searchPost($request));
    }

    function store(StorePostRequest $request, PostService $postService)
    {
        // $postCreated = $postService->createdPost($request);

        // return response()->json([
        //     'message' => 'Post created successfully',
        //     'post' => $postCreated
        // ], 201);
        $data = $request->validated();

        $dto = new CreatePostDTO(
            title: $data['title'],
            content: $data['content'],
            userId: Auth::id()
        );

        $postCreated = $postService->createdPost($dto);

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
        // $postService->deletePost($id);

        // return response()->json([
        //     'message' => 'Post deleted'
        // ]);
        $result = $postService->deletePost($id);

        if ($result['error']) {
            return response()->json([
                'message' => $result['message']
            ], 404);
        }

        return response()->json([
            'message' => $result['message']
        ]);
    }
}
