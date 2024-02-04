@extends('layouts.dashboard.parent')
@section('page-title','Add Category')
@section('title','Add Category')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Category</h2>
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
                
                <form method="POST" action="{{route('dashboard.categories.store')}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                 @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="add-category" >Add Category <span class="required" >*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="category_name"  required="required" id="add-category"  value="{{old('category_name')}}" class="form-control ">
                        </div>
                       
                    </div>
                    @error('category_name')
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