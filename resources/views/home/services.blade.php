<div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">View Posts </h1>
            <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
            <div class="services_section_2">
               <div class="row">
                  <div class="col-md-4">
                     @foreach ($posts as $post)
                        <div class="card">
                           <div class="card-body">
                                 <h5 class="card-title">{{ $post->title }}</h5>
                                 <p class="card-text">{{ $post->user->first_name }} {{ $post->user->last_name }}</p>
                                 <p class="card-text">{{ $post->datetime_updated }}</p>
                                 <a href="{{ route('post.show', $post) }}" class="btn btn-primary">View Post</a>
                           </div>
                        </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>