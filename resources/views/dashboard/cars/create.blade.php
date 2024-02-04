@extends('layouts.dashboard.parent')
@section('page-title','Add Car')
@section('title','Add Car')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Car</h2>
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
                <form  method="post" action="{{route('dashboard.cars.store')}}" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                   @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="title" value="{{old('title')}}" id="title" required="required" class="form-control ">
                        </div>
                    </div>
                    @error('title')

                    <div class="alert alert-danger w-50 m-auto ">{{$message}}</div>
                        
                    @enderror
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea id="description" name="description"  required="required" class="form-control">{{old('description')}}</textarea>
                        </div>
                    </div>
                    @error('description')

                    <div class="alert alert-danger mt-1">{{$message}}</div>
                        
                    @enderror
                    <div class="item form-group">
                        <label for="luggage" class="col-form-label col-md-3 col-sm-3 label-align">Luggage <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="luggage" class="form-control" type="number" name="luggage" value="{{old('luggage')}}" required="required">
                        </div>
                    </div>
                    @error('luggage')

                    <div class="alert alert-danger mt-1">{{$message}}</div>
                        
                    @enderror
                    <div class="item form-group">
                        <label for="doors" class="col-form-label col-md-3 col-sm-3 label-align">Doors <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="doors" class="form-control" type="number" name="doors" value="{{old('doors')}}" required="required">
                        </div>
                    </div>
                    @error('doors')

                    <div class="alert alert-danger mt-1">{{$message}}</div>
                        
                    @enderror
                    <div class="item form-group">
                        <label for="passengers" class="col-form-label col-md-3 col-sm-3 label-align">Passengers <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">

                            <input id="passengers" class="form-control" name="passengers" type="number" value="{{old('passengers')}}"  required="required">
                        </div>
                    </div>
                    @error('passengers')

                    <div class="alert alert-danger mt-1">{{$message}}</div>
                        
                    @enderror
                    <div class="item form-group">
                        <label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="price" class="form-control" type="number" name="price" value="{{old('price')}}" required="required">
                        </div>
                    </div>
                    @error('price')

                    <div class="alert alert-danger mt-1">{{$message}}</div>
                        
                    @enderror
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" {{ old('is_active') ? 'checked':'' }}  name="is_active" class="flat">
                            </label>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" id="image"  name="image" required="required" class="form-control">
                            <div class="mt-2" >
                                <img width="100px" height="100px"  id="imageShow" src="{{asset('assets/dashboard/images/No-Image-Placeholder.svg.png')}}" alt="car image">
                            </div>
                        </div>

                    </div>
                   

                    @error('image')

                    <div class="alert alert-danger mt-1">{{$message}}</div>
                        
                    @enderror
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select @error('category_id') is-invalid @enderror class="form-control" value="{{old('category_id')}}" name="category_id" id="">
                                <option disabled selected  value=" ">Select Category</option>
                                @foreach ($categories as $category)
                                    
                                <option {{ $category->id == old('category_id') ? 'selected':''  }} value="{{$category->id}}">{{$category->category_name}}</option>
                                
                                @endforeach

                            </select>
                        </div>
                    </div>
                    @error('category_id')

                    <div class="alert alert-danger mt-1">{{$message}}</div>
                        
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