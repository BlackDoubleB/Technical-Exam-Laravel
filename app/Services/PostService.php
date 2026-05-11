<?php

namespace App\Services;

use App\DTOs\CreatePostDTO;
use App\Http\Requests\SearchPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostService
{

    function searchPost(SearchPostRequest $request)
    {
        $query = Post::query();
        $data = $request->validated();
        if (!empty($data['mine']) && $data['mine']) {
            $query->where('user_id', $request->user()->id);
        } elseif (!empty($data['user_id'])) {
            $query->where('user_id', $data['user_id']);
        }

        $sort = $data['sort'] ?? 'desc';
        $query->orderBy('created_at', $sort);


        $result = $query->paginate(5)->withQueryString();

        if ($result->isEmpty()) {
            return [
                'message' => 'No hay registros',
                'data' => []
            ];
        }

        return $result;
    }

    function createdPost(CreatePostDTO $dto)
    {
        // $data = $request->validated();

        // $post = Post::create([
        //     ...$data,
        //     'user_id' => Auth::id(),
        // ]);
        // return $post;
        $result = DB::select(
            'CALL crear_post(?, ?, ?)',
            [
                $dto->title,
                $dto->content,
                $dto->userId
            ]
        );

        return $result[0];
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
        $post = Post::find($id);

        if (!$post) {
            return [
                'error' => true,
                'message' => 'El post no existe'
            ];
        }

        $post->delete();

        return [
            'error' => false,
            'message' => 'Post eliminado correctamente'
        ];
    }
}
