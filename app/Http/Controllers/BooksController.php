<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BooksResource;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response([
            "status_code" => 200,
            "status" => "success",
            "data" => BooksResource::collection(Book::all())
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::create([
            "name" => $request->name,
            "isbn" => $request->isbn,
            "authors" => $request->authors,
            "country" => $request->country,
            "number_of_pages" => $request->number_of_pages,
            "publisher" => $request->publisher,
            "release_date" => $request->release_date
        ]);

            return Response([
                "status_code" => 201,
                "status" => "success",
                "data" =>[
                    "books" =>[
                        "name" => $book->name,
                        "isbn" => $book->isbn,
                        "authors" => [
                            $book->authors
                        ],
                        "country" => $book->country,
                        "number_of_pages" => $book->number_of_pages,
                        "publisher" => $book->publisher,
                        "release_date" => $book->release_date
                    ]
                ]                
                
            ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return [
                "status_code" => 200,
                "status" => "success",
                "data" =>  new BooksResource($book)
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update([
            "name" => $request->name,
            "isbn" => $request->isbn,
            "authors" => $request->authors,
            "country" => $request->country,
            "number_of_pages" => $request->number_of_pages,
            "publisher" => $request->publisher,
            "release_date" => $request->release_date
        ]);

        return Response([
            "status_code" => 200,
            "status" => "success",
            "message" => "The book '{$book->name}' was updated successfully",
            "data" =>  new BooksResource($book)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return Response([
            "status_code" => 204,
            "status" => "success",
            "message" => "The book '{$book->name}' was deleted successfully",
            "data" =>  []
        ]);
    }
}
