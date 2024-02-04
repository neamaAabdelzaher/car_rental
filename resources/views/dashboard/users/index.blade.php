@extends('layouts.dashboard.parent')
@section('page-title','Manage Users')
@section('title','Manage Users')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>List of Users</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Settings 1</a>
                  <a class="dropdown-item" href="#">Settings 2</a>
                </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
          <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            @include('includes.dashboard.messages')
            <thead>
              <tr>
                <th>Registration Date</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Email Verified At</th>
                <th>Active</th>
                <th>Edit</th>
              </tr>
            </thead>


            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{$user->created_at}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->email_verified_at}}</td>
                <td>{{$user->is_active ?'Yes':'No'}}</td>
                <td>
                  <a href="{{route('dashboard.users.edit',$user->id)}}" >
                    <img src="{{asset('assets/dashboard/images/edit.png')}}" alt="Edit">
                  </a>
                </td>
              </tr>
         @endforeach
            
             
          
            
            </tbody>
          </table>
        </div>
        </div>
    </div>
  </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
@endsection
