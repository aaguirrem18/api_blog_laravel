<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\src\Infrastucture\Persistence\Eloquent\AuthorEloquentModel;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding product.
     *
     * @var string
     */
    protected $model = AuthorEloquentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name
        ];
    }
}
