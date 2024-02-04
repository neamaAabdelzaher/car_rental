<header class="site-navbar site-navbar-target" role="banner">

    <div class="container">
      <div class="row align-items-center position-relative">

        <div class="col-3">
          <div class="site-logo">
            <a href="{{route('website.index')}}"><strong>CarRental</strong></a>
          </div>
        </div>

        <div class="col-9  text-right">
          
          <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

          <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
            <ul class="site-menu main-menu js-clone-nav ml-auto ">
              <li class="@if(Route::currentRouteName() === 'website.index') active @endif "  ><a href="{{route('website.index')}}" class="nav-link">Home</a></li>
              <li class="@if(Route::currentRouteName() === 'website.listing.index') active @endif "><a href="{{route('website.listing.index')}}" class="nav-link">Listing</a></li>
              <li class="@if(Route::currentRouteName() === 'website.testimonials.index') active @endif"><a href="{{route('website.testimonials.index')}}" class="nav-link">Testimonials</a></li>
              <li class="@if(Route::currentRouteName() === 'website.blog.blog') active @endif"><a href="{{route('website.blog.blog')}}" class="nav-link">Blog</a></li>
              <li class="@if(Route::currentRouteName() === 'website.about.about') active @endif" ><a href="{{route('website.about.about')}}" class="nav-link">About</a></li>
              <li class="@if(Route::currentRouteName() === 'website.messages.index') active @endif"  ><a href="{{route('website.messages.index')}}" class="nav-link">Contact</a></li>
              @if(Auth::check())
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle bg-info text-light border border-secondary rounded p-2" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                 
                  {{auth()->user()->name}}

                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                </div>
              </li>
              @else
              <li><a class="btn border border-dark p-2 bg-dark text-light" href="{{route('login')}}"> Join Us</a></li>
              @endif

              
            </ul>
          </nav>
        </div>

        
      </div>
    </div>

  </header>