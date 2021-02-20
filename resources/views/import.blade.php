@extends('layouts.app')

@section('title')
    Upload XML file
@endsection

@section('content')
<div class="container">
    <form method="POST" action="{{ route('import.upload') }}" enctype="multipart/form-data">
        @csrf
        <div class="input-group is-invalid">
            <div class="custom-file">
                <input type="file" name="file" id="file" class="custom-file-input">
                <label class="custom-file-label" for="file">Choose file...</label>
            </div>
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-secondary">Upload</button>
            </div>
        </div>
        @error('file')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </form>
</div>
@endsection