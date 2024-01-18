<div class="services_section layout_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @php
                    $authUserIsAuthorOfAllPosts = $posts->every(function ($post) {
                        return $post->user_id == auth()->id(); });
                @endphp
                @if($posts->isNotEmpty() && !$authUserIsAuthorOfAllPosts)
                    <br><h1 class="services_taital">View Posts </h1>
                    @foreach ($posts as $post)
                        @if(auth()->check())
                            @if($post->user_id != auth()->id())
                                <a href="{{ route('postshow', $post->id) }}"><div class ="card">
                                    <div class="card-header"><h1>{{ $post->title }}</h1></div>
                                    <div class="card-body">{{ $post->content }}</div>
                                    <div class="card-footer"><small class="text-muted">
                                        Posted by {{ $post->user->first_name }} {{ $post->user->last_name }} <br>
                                        Posted at: {{ $post->created_at->format('m/d/Y H:i') }}
                                        @if ($post->created_at != $post->updated_at)
                                            <br>Updated at: {{ $post->updated_at->format('m/d/Y H:i') }}
                                        @endif
                                    </small></div>
                                </div></a>
                            @endif
                        @else
                            <a href="{{ route('postshow', $post->id) }}"><div class ="card">
                                <div class="card-header"><h1>{{ $post->title }}</h1></div>
                                <div class="card-body">{{ $post->content }}</div>
                                <div class="card-footer"><small class="text-muted">
                                    Posted by {{ $post->user->first_name }} {{ $post->user->last_name }} <br>
                                    Posted at: {{ $post->created_at->format('m/d/Y H:i') }}
                                    @if ($post->created_at != $post->updated_at)
                                        <br>Updated at: {{ $post->updated_at->format('m/d/Y H:i') }}
                                    @endif
                                </small></div>
                            </div></a>
                        @endif
                        <br>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>