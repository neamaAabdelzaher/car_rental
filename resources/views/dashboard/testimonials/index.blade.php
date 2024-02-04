@extends('layouts.dashboard.parent')
@section('page-title','Testimonials')
@section('title','Testimonials')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>List of Testimonials</h2>
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
                <th>Name</th>
                <th>Position</th>
                <th>Published</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $testimonial)
              <tr>
                <td>{{$testimonial->name}}</td>
                <td>{{$testimonial->position}}</td>
                <td>{{$testimonial->published ?'Yes✅':'No❌'}}</td>
                <td>
                    <a href="{{route('dashboard.testimonials.edit',$testimonial->id)}}">
                        <img src="{{asset('assets/dashboard/images/edit.png')}}" alt="Edit">
                    </a>
                </td>
                <td>
                    <a href="{{route('dashboard.testimonials.delete',$testimonial->id)}}">
                    <img src="{{asset('assets/dashboard/images/delete.png')}}" alt="Delete">
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
@endsection