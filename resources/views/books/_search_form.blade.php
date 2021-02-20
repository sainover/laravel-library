<form method="GET" action="{{ route('books.index') }}">
    <div class="input-group">
        <input class="form-control" type="search" name="query" placeholder="Search" aria-label="Search" 
            value={{ request()->has('query') ? request()->input('query') : ''}}
        >
        <div class="input-group-append">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </div>
    </div>
    <small class="form-text text-muted text-muted">
        @if (request()->has('query'))
            {{ trans_choice('books.search_results', $books->total(), ['query' => request()->input('query')]) }}
        @endif
    </small>
</form>