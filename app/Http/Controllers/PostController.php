<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    function index(){
         return response()->json([
            'message' => 'Tienes acceso',
        ]);
    }
    function store(StorePostRequest $request){
        $data = $request->validated();

        $post = Post::create([
            ...$data,
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'message' => 'Post creado correctamente',
            'post' => $post
        ], 201);

    }
}
