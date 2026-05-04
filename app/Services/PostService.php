<?php

namespace App\Services;

use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostService
{

    function searchPost(Request $request)
    {
        $query = Post::query();

        if ($request->boolean('mine')) {
            $query->where('user_id', Auth::id());
        } else if ($request->has('user_id') && is_numeric($request->user_id)) {
            $query->where('user_id', $request->user_id);
        }

        $sort = $request->get('sort', 'desc');
        $query->orderBy('created_at', $sort);

        $posts = $query->paginate(5);
        return $posts;
    }

    function createdPost(Request $request)
    {
        $data = $request->validated();

        $post = Post::create([
            ...$data,
            'user_id' => Auth::id(),
        ]);
        return $post;
    }

    function searchPostId(string $id)
    {
        $post = Post::findOrFail($id);
        return $post;
    }

    function updatePost(int $id, UpdatePostRequest $request)
    {
        $post = Post::findOrFail($id);
        $data = $request->validated();
        $post->update($data);

        return $post;
    }

    function deletePost(int $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    }
}
