@extends('layouts.website.parent',['homeHeading'=>false],['heading'=>false])
@section('content')
<div class="hero inner-page" style="background-image: url('{{asset('assets/website/images/hero_1_a.jpg')}}');">
        
    <div class="container">
      <div class="row align-items-end ">
        <div class="col-lg-12">

          <div class="intro">
            <h1><strong>{{$car->title}}</strong></h1>
            <div class="pb-4"><strong class="text-black">Posted on {{$car->created_at->format('d/m/Y')}}</strong></div>
          </div>

        </div>
      </div>
    </div>
  </div>



<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-8 blog-content">
        <img src="{{asset('assets/dashboard/images/cars/'.$car->image)}}" alt="" class="img-fluid p-3 mb-5 bg-white rounded">
        
        <div class="grey-bg container-fluid">
          <section id="minimal-statistics">
            <div class="row">
              <div class="col-12 mt-3 mb-1">
                <h4 class="text-uppercase">Properties</h4>
                <p>Car Details</p>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-3 col-sm-6 col-12"> 
                <div class="card">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="align-self-center">
                          <i class="icon-pencil primary font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                          <h3>{{$car->doors}}</h3>
                          <span>Doors</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="align-self-center">
                          <i class="icon-speech warning font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                          <h3>{{$car->luggage}}</h3>
                          <span>Laggage</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="align-self-center">
                          <i class="icon-graph success font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                          <h3>{{$car->price}} $</h3>
                          <span>Price</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>              
        </div>

        <p class="lead">{{$car->description}}</p>
        

        <div class="pt-5">
          <p>Category:  <a href="#">Design</a></p>
        </div>


        <div class="pt-5">
          <ul class="comment-list">
           
            @foreach($comments as $comment)
            @if($comment->car_id === $car->id)
            <li class="comment">
              
              <div class="vcard bio">
                <img src="{{asset('assets/website/images/person_3.jpg')}}" alt="Free Website Template by Free-Template.co">
              </div>
              <div class="comment-body">
               
                <h3>{{$comment->name}}</h3>
                <div class="meta">{{$comment->created_at->toDayDateTimeString()}}</div>
                <p>{{$comment->body}}</p>
                {{-- replay --}}
                <form action="{{route('website.comments.reply')}}" method="POST">
                  @csrf
              <input hidden type="number" value="{{$comment->id}}" name="comment_id" class="form-control" >
                  <div class="form-group">
                    <textarea name="body" id="message" cols="30" rows="2" class="form-control"></textarea>
                  </div>
                  @error('body')

                  <div class="alert alert-danger mt-1">{{$message}}</div>
                      
                  @enderror
                  <div class="form-group">
                    <input type="submit" value="Reply" class="btn btn-secondary btn-md text-white">
                  </div>
                </form>
                
               
              </div>

              <ul class="children">
                @foreach ($replies as $reply)
                @if($reply->comment_id === $comment->id)
                    
                
                <li class="comment">
                  <div class="vcard bio">
                    <img src="{{asset('assets/website/images/person_5.jpg')}}" alt="Free Website Template by Free-Template.co">
                  </div>
                  <div class="comment-body">
                    <h3>{{$reply->name}}</h3>
                    <div class="meta">{{$reply->created_at->toDayDateTimeString()}}</div>
                    <p>{{$reply->body}}</p>
                  </div>
                </li>
                @endif
                @endforeach
              </ul>
            </li>

            @endif
            @endforeach
          </ul>

          <!-- END comment-list -->
          
          <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Leave a comment</h3>
            <form action="{{route('website.comments.store')}}" method="POST" class="">
              @csrf
              <input hidden type="number" value="{{$car->id}}" name="car_id" class="form-control" >
              <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" name="name" class="form-control" id="name">
              </div>
              @error('name')

              <div class="alert alert-danger mt-1">{{$message}}</div>
                  
              @enderror
              <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" name="email" class="form-control" id="email">
              </div>
              
              @error('email')

              <div class="alert alert-danger mt-1">{{$message}}</div>
                  
              @enderror
              <div class="form-group">
                <label for="message">Comment</label>
                <textarea name="body" id="message" cols="30" rows="10" class="form-control"></textarea>
              </div>
              @error('body')

              <div class="alert alert-danger mt-1">{{$message}}</div>
                  
              @enderror
              <div class="form-group">
                <input type="submit" value="Post Comment" class="btn btn-primary btn-md text-white">
              </div>

            </form>
          </div>
        </div>

      </div>
      <div class="col-md-4 sidebar">
        <div class="sidebar-box">
          <form action="#" class="search-form">
            <div class="form-group">
              <span class="icon fa fa-search"></span>
              <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
            </div>
          </form>
        </div>
        <div class="sidebar-box">
          <div class="categories">
            <h3>Categories</h3>
            @foreach($categories as $category)
            <li><a href="#">{{$category->category_name}} <span>({{$carsEachCat=$car->where('category_id', $category->id)->count()}})</span></a></li>
            
            @endforeach
          </div>
        </div>
        <div class="sidebar-box">
          <img src="{{asset('assets/website/images/person_1.jpg')}}" alt="Free Website Template by Free-Template.co" class="img-fluid mb-4 w-50 rounded-circle">
          <h3 class="text-black">About The Author</h3>
          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
          <p><a href="#" class="btn btn-primary btn-md text-white">Read More</a></p>
        </div>

        <div class="sidebar-box">
          <h3 class="text-black">Paragraph</h3>
          <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection