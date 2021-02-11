@extends('layout');

@section('title')
    Books
@endsection

@section('content')
    <div class="row">
        @foreach ($books as $book)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ $book->hasMedia() ? $book->getFirstMediaUrl('default', 'thumb') : 'default-img.png' }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{ $book->description }}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">ISBN {{ $book->isbn }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $books->links() }}
@endsection