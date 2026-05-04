<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_no_autenticado_no_puede_ver_posts()
    {
        $response = $this->getJson('/api/posts');

        $response->assertStatus(401);
    }


    public function test_usuario_autenticado_puede_ver_posts()
    {
        $user = User::factory()->create();

        Post::factory()->count(3)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)
            ->getJson('/api/posts');

        $response->assertStatus(200)
            ->assertJsonCount(3,'data'); 
    }

    public function test_no_puede_crear_post_con_datos_invalidos()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->postJson('/api/posts', []);

        $response->assertStatus(422); 
    }


    public function test_usuario_puede_crear_post()
    {
        $user = User::factory()->create();

        $data = [
            'title' => 'Mi post',
            'content' => 'Contenido del post'
        ];

        $response = $this->actingAs($user)
            ->postJson('/api/posts', $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('posts', [
            'title' => 'Mi post'
        ]);
    }

    public function test_usuario_puede_eliminar_su_post()
    {
        $user = User::factory()->create();

        $post = Post::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)
            ->deleteJson("/api/posts/{$post->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('posts', [
            'id' => $post->id
        ]);
    }
}
