@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class ="card">
                    <div class="card-header"><h1>{{ $post->title }}</h1></div>
                    <div class="card-body">{{ $post->content }}</div>
                    <div class="card-footer"><small class="text-muted">
                    Posted by {{ $post->user->first_name }} {{ $post->user->last_name }} <br>
                    Posted at: {{ $post->created_at->format('m/d/Y H:i') }}
                    @if ($post->created_at != $post->updated_at)
                        <br>Updated at: {{ $post->updated_at->format('m/d/Y H:i') }}
                    @endif
                </small></div>
            </div>
        </div>
    </div>
</div>
@endsection