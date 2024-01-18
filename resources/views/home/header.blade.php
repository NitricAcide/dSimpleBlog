<div class="header_main">
            <div class="mobile_menu">
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <div class="logo_mobile"><a href="{{route('homepage')}}"><img src="images/logo.png"></a></div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('homepage')}}">Home</a>
                        </li>
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('account')}}">{{ Auth::user()->username }}</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                           <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                              @csrf
                           </form>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">Register</a>
                        </li>
                        @endauth
                        @endif
                     </ul>
                  </div>
               </nav>
            </div>
            <div class="container-fluid">
               <div class="logo"><a href="{{route('homepage')}}"><img src="images/logo.png"></a></div>
               <div class="menu_main">
                  <ul>
                     <li class="active"><a href="{{route('homepage')}}">Home</a></li>
                     @if (Route::has('login'))
                     @auth
                     <li><a href="{{route('account')}}">{{ Auth::user()->username }}</a></li>
                     <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                           @csrf
                    </form></li>
                        @else
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{route('register')}}">Register</a></li>
                    @endauth
                    @endif
                  </ul>
               </div>
            </div>
         </div>