<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\src\Infrastucture\Persistence\Eloquent\PostEloquentModel;

class PostControllerTest  extends TestCase
{
    //use RefreshDatabase;


    /** @test */
    public function post_create_success_faker()
    {
        // Crear un post utilizando el factory
        $post = PostEloquentModel::factory()->create([
            'title' => 'Test Post',
            'content' => 'This is a test post',
        ]);

        // Hacer la solicitud HTTP POST con los datos del post creado
        $response = $this->postJson('/api/posts', [
            'title' => $post->title,
            'content' => $post->content,
            'author_id' => $post->author_id,
        ]);

        // Verificar que la respuesta tenga los datos correctos
        $response->assertStatus(201)
            ->assertJson([
                'message' => 'post created',
                'data' => [],
            ]);

        // Verificar que el post no se haya guardado en la base de datos
        $this->assertDatabaseMissing('posts', [
            'title' => 'Test NOT Posted',
            'content' => 'This is not a test post',
        ]);
    }

    /** @test */
    public function post_create_success_api()
    {
        $response = $this->post('/api/posts', [
            'title' => 'hola',
            'content' => 'hola',
            'author_id' => 1
        ]);

        $response->assertStatus(201);
    }
}
