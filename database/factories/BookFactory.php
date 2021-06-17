<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "isbn" => rand(100, 300)."-".rand(1000000, 10000000),
            "authors" => $this->faker->name,
            "country" => $this->faker->country,
            "number_of_pages" => rand(200, 1000),
            "publisher" => $this->faker->name,
            "release_date" => date("Y-m-d")
        ];
    }
}
