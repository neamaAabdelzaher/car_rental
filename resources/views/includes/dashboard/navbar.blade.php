      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                @if(Auth::check())
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="{{asset('assets/dashboard/images/img.jpg')}}" alt=""> {{auth()->user()->name}}
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

              <li role="presentation" class="nav-item dropdown open">
                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">{{Auth::User()->unreadNotifications->count()}}</span>
                </a>
                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                 @foreach(Auth::User()->unreadNotifications as $notification)
                  <li class="nav-item">
                    <a href="{{route('dashboard.messages.markAsRead')}}">mark all as read</a>
                    <a href="{{route('dashboard.messages.show',$notification->data['message_id'])}}" class="dropdown-item">
                      <span class="image"><img src="{{asset('assets/dashboard/images/img.jpg')}}" alt="Profile Image" /></span>
                      <span>
                        <span>{{$notification->data['firstName']}} {{$notification->data['lastName']}} </span>
                        <span class="time">{{$notification->created_at}} </span>
                      </span>
                      <span class="message">
                        {{$notification->data['message']}} 
                      </span>
                    </a>
                  
                  </li>
                  @endforeach
                  @endif

                  
                  <li class="nav-item">
                    <div class="text-center">
                      <a href="{{route('dashboard.messages.index')}}" class="dropdown-item">
                        <strong>See All Messages</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    <!-- /top navigation -->
