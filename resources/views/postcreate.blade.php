@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Create a new post</h1>
            <form action="{{ route('poststore') }}" method="POST">
                @csrf
                <div class="form-group" style="padding: 20px 0px">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group" style="padding-bottom: 20px">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>
    </div>
</div>
@endsection