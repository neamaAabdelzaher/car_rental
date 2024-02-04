@extends('layouts.dashboard.parent')
@section('page-title','Add User')
@section('title','Add User')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add User</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="#">Settings 1</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form  method="POST"  action="{{route('dashboard.users.store')}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="full-name">Full Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="full-name" name="name" required="required" class=" @error('name') is-invalid @enderror form-control " value="{{old('name')}}">
                        </div>
    
                    </div>
                    @error('name')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="user-name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="user-name" name="username" required="required" class=" @error('username') is-invalid @enderror form-control" value="{{old('username')}}">
                        </div>
                       
                    </div>
                    @error('username')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="item form-group">
                        <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="email" class=" @error('email') is-invalid @enderror form-control" type="email" name="email" required="required" value="{{old('email')}}">
                        </div>
                       
                    </div>
                    @error('email')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="is_active" {{ old('is_active') ? 'checked':'' }} class="@error('is_active') is-invalid @enderror flat" >
                            </label>
                        </div>
                      
                    </div>
                    @error('is_active')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="password" id="password" name="password" required="required" class="@error('password') is-invalid @enderror form-control" value="{{old('password')}}" >
                        </div>
                      
                    </div>
                    @error('password')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection