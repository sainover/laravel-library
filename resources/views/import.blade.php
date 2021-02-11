@extends('layout');

@section('title')
    Upload XML file
@endsection

@section('content')
    <form method="POST" action="{{ route('import.upload') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            @error('file')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="file">XML import file</label>
            <input type="file" name="file" id="file" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-success">Upload</button>
    </form>
@endsection