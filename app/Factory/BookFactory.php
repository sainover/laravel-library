<?php

namespace App\Factory;

use App\Models\Book;

class BookFactory
{
    public function fromArray(array $attributes): Book
    {
        $book = Book::create([
            'title' => $attributes['title'],
            'isbn' => $attributes['isbn'],
            'description' => $attributes['description'],
        ]);

        $book
            ->addMediaFromUrl($attributes['image'])
            ->sanitizingFileName(function ($filename) {
                return \generate_filename($filename);
            })
            ->toMediaCollection();

        return $book;
    }
}
