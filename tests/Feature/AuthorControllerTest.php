<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\src\Infrastucture\Persistence\Eloquent\AuthorEloquentModel;

class AuthorControllerTest  extends TestCase
{
    /** @test */
    public function an_author_can_be_created()
    {
        $response = $this->post('/api/authors', [
            'name' => 'author 1',
        ]);

        $response->assertStatus(201);

        $author = AuthorEloquentModel::first();
        $this->assertEquals($author->name, 'author 1');
    }
}
