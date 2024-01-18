@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Update Post</h1>
            <form method="POST" action="{{ route('postupdate', $post->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group" style="padding: 20px 0px">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                </div>
                <div class="form-group" style="padding-bottom: 20px">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3" required>{{ $post->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Post</button>
            </form>
        </div>
    </div>
</div>
@endsection