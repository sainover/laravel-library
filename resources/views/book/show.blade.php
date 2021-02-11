@extends('layout');

@section('title')
    Books
@endsection

@section('content')
    @foreach ($books as $book)
       <p>{{ $book->title }}</p>
       <img src="{{ $book->hasMedia() ? $book->getFirstMediaUrl('default', 'thumb') : null }}">
    @endforeach
@endsection