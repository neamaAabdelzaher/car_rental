<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="{{route('website.index')}}" class="site_title"><i class="fa fa-car"></i></i> <span>Rent Car Admin</span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="{{asset('assets/dashboard/images/img.jpg')}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          @if(Auth::check())
          <h2>{{auth()->user()->name}}</h2>
          @endif
        </div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                  <div class="menu_section">
                      <h3>General</h3>
                      <ul class="nav side-menu">
                          <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                  <li><a href="{{route('dashboard.users.index')}}">Users List</a></li>
                                  <li><a href="{{route('dashboard.users.create')}}">Add User</a></li>
                              </ul>
                          </li>
                          <li><a><i class="fa fa-edit"></i> Categories <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                  <li><a href="{{route('dashboard.categories.create')}}">Add Category</a></li>
                                  <li><a href="{{route('dashboard.categories.index')}}">Categories List</a></li>
                              </ul>
                          </li>
                          <li><a><i class="fa fa-desktop"></i> Cars <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                  <li><a href="{{route('dashboard.cars.create')}}">Add Car</a></li>
                                  <li><a href="{{route('dashboard.cars.index')}}">Cars List</a></li>
                              </ul>
                          </li>
          <li><a><i class="fa fa-desktop"></i> Testimonials <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                  <li><a href="{{route('dashboard.testimonials.create')}}">Add Testimonials</a></li>
                                  <li><a href="{{route('dashboard.testimonials.index')}}">All Testimonials</a></li>
                              </ul>
                          </li>
          <li><a><i class="fa fa-desktop"></i> Messages <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                  <li><a href="{{route('dashboard.messages.index')}}">Messages</a></li>
                              </ul>
                          </li>
                      </ul>
                  </div>

              </div>
              <!-- /sidebar menu -->

      <!-- /menu footer buttons -->
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>
      <!-- /menu footer buttons -->
    </div>
  </div>