@extends('layout');

@section('title')
    Books
@endsection

@section('content')
    @foreach ($books as $book)
       $book.title 
    @endforeach
@endsection