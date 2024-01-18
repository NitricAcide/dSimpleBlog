@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div id="options" class="card" >
                <div class="card-header">Select an option</div>
                <div class="card-body">
                    <a href="{{route('postcreate')}}" class="btn btn-primary" style="margin-right: 10px">Create a new post</a>
                    <button id="viewPostsButton" class="btn btn-secondary">View my posts</button>
                </div>
            </div>
            <div id="posts" class="card" style="display: none;">
                <div class="card-header">My posts</div>
                <div class="card-body">
                    @foreach ($posts as $post)
                        <div class="card" style="margin: 10px 0px;">
                            <div class="card-header"><h1>{{ e($post->title) }}</h1></div>
                            <div class="card-body">{{ e($post->content) }}</div>
                            <div class="card-footer">
                                <div class="button-container" style="display: flex; justify-content: flex-start; gap: 10px; padding: 5px">
                                    <a href="{{ route('postedit', $post->id) }}" class="btn btn-primary">Update</a>
                                    <form method="POST" action="{{ route('postdelete', $post->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <button id="backButton" class="btn btn-secondary">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
window.onload = function() {
    document.getElementById('viewPostsButton').addEventListener('click', function() {
        document.getElementById('options').style.display = 'none';
        document.getElementById('posts').style.display = 'block';
    });

    document.getElementById('backButton').addEventListener('click', function() {
        document.getElementById('posts').style.display = 'none';
        document.getElementById('options').style.display = 'block';
    });
};
</script>
@endsection