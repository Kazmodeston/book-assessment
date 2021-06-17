<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_book()
    {
        $formData = [
            "name" => "The Gods Must be Crazy",
            "isbn" => rand(100, 300)."-".rand(1000000, 10000000),
            "authors" => "Muhammad",
            "country" => "Nigeria",
            "number_of_pages" => rand(200, 1000),
            "publisher" => "Vanguard",
            "release_date" => date("Y-m-d")
        ];

        $this->withoutExceptionHandling();

        $this->json("POST",route("books.store"), $formData)
                ->assertStatus(201);
    }
}
