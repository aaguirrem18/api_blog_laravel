<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\src\Infrastucture\Persistence\Eloquent\PostEloquentModel;
use App\src\Infrastucture\Persistence\Eloquent\AuthorEloquentModel;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding product.
     *
     * @var string
     */
    protected $model = PostEloquentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'author_id' => function () {
                return AuthorEloquentModel::factory()->create()->id;
            }
        ];
    }
}
