@extends('layouts.dashboard.parent')
@section('page-title','Edit Testimonial')
@section('title','Edit Testimonial')
@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Testimonial</h2>
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
                <form action="{{route('dashboard.testimonials.update',$testimonial->id)}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                 @csrf
                 @method('Put')
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="name" id="name" value="{{$testimonial->name}}" required="required"  class="form-control ">
                        </div>
                    </div>
                    @error('name')

                    <div class="alert alert-danger w-50  m-auto ">{{$message}}</div>
                        
                    @enderror
                    <div class="item form-group mt-2">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="position">Position <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="position" value="{{$testimonial->position}}" required="required" id="position"  class="form-control ">
                        </div>
                    </div>
                    @error('position')

                    <div class="alert alert-danger w-50 m-auto ">{{$message}}</div>
                        
                    @enderror
                    <div class="item form-group mt-2">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="content"> Content<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea id="content" name="content" required="required" class="form-control">{{$testimonial->content}}</textarea>
                        </div>
                    </div>
                    @error('content')

                    <div class="alert alert-danger w-50 m-auto ">{{$message}}</div>
                        
                    @enderror
                    
                    <div class="item form-group mt-2">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Published</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"  name="published" @checked($testimonial->published) class="flat">
                            </label>
                        </div>
                    </div>
                    @error('published')

                    <div class="alert alert-danger w-50 m-auto ">{{$message}}</div>
                        
                    @enderror
                    <div class="item form-group mt-2">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" id="image"  name="image"  class="form-control">
                            <div class="mt-2" >
                                <img width="100px" height="100px"  id="imageShow" src="{{asset('assets/dashboard/images/testimonials/'.$testimonial->image)}}" alt="car image">
                            </div>
                        </div>
                    </div>

                    @error('image')

                    <div class="alert alert-danger w-50 m-auto ">{{$message}}</div>
                        
                    @enderror
                    <div class="ln_solid"></div>
                    <div class="item form-group mt-2">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button type="submit" class="btn btn-success">update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('input[type="file"]').change(function(e) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#imageShow').attr('src', e.target.result);
        };

        reader.readAsDataURL(this.files[0]); // Read the selected image file
    });
});
</script>
@endsection