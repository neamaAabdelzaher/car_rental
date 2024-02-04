@extends('layouts.website.parent',['heading'=>false])
{{-- @section('page-title','Dashboard')
@section('title','Dashboard') --}}
@section('content')
<div class="site-section">
    <div class="container">
      <h2 class="section-heading"><strong>How it works?</strong></h2>
      <p class="mb-5">Easy steps to get you started</p>    

      <div class="row mb-5">
        <div class="col-lg-4 mb-4 mb-lg-0">
          <div class="step">
            <span>1</span>
            <div class="step-inner">
              <span class="number text-primary">01.</span>
              <h3>Select a car</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, laboriosam!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4 mb-lg-0">
          <div class="step">
            <span>2</span>
            <div class="step-inner">
              <span class="number text-primary">02.</span>
              <h3>Fill up form</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, laboriosam!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4 mb-lg-0">
          <div class="step">
            <span>3</span>
            <div class="step-inner">
              <span class="number text-primary">03.</span>
              <h3>Payment</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, laboriosam!</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 mx-auto">
          <a href="#" class="d-flex align-items-center play-now mx-auto">
            <span class="icon">
              <span class="icon-play"></span>
            </span>
            <span class="caption">Video how it works</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  
  <div class="site-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 text-center order-lg-2">
          <div class="img-wrap-1 mb-5">
            <img src="{{asset('assets/website/images/feature_01.png')}}" alt="Image" class="img-fluid">
          </div>
        </div>
        <div class="col-lg-4 ml-auto order-lg-1">
          <h3 class="mb-4 section-heading"><strong>You can easily avail our promo for renting a car.</strong></h3>
          <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, explicabo iste a labore id est quas, doloremque veritatis! Provident odit pariatur dolorem quisquam, voluptatibus voluptates optio accusamus, vel quasi quidem!</p>
          
          <p><a href="#" class="btn btn-primary">Meet them now</a></p>
        </div>
      </div>
    </div>
  </div>

  

<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h2 class="section-heading"><strong>Car Listings</strong></h2>
        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
      </div>
    </div>
    

    <div class="row">
        @foreach($cars as $car)
        @if($car->is_active===1)
      <div class="col-md-6 col-lg-4 mb-4">

        <div class="listing d-block  align-items-stretch">
          <div class="listing-img h-100 mr-4">
            <img src="{{asset('assets/dashboard/images/cars/'.$car->image)}}" alt="Image" class="img-fluid">
          </div>
          <div class="listing-contents h-100">
            <h3>{{$car->title}}</h3>
            <div class="rent-price">
              <strong>${{$car->price}}</strong><span class="mx-1">/</span>day
            </div>
            <div class="d-block d-md-flex mb-3 border-bottom pb-3">
              <div class="listing-feature pr-4">
                <span class="caption">Luggage:</span>
                <span class="number">{{$car->luggage}}</span>
              </div>
              <div class="listing-feature pr-4">
                <span class="caption">Doors:</span>
                <span class="number">{{$car->doors}}</span>
              </div>
              <div class="listing-feature pr-4">
                <span class="caption">Passenger:</span>
                <span class="number">{{$car->passengers}}</span>
              </div>
            </div>
            <div>
              <p>{{$shortDesc = Str::limit($car->description,100)}}</p>
              <p><a href="{{route('website.listing.show',$car->id)}}" class="btn btn-primary btn-sm">Rent Now</a></p>
            </div>
          </div>

        </div>
      </div>
      @endif
      @endforeach

    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h2 class="section-heading"><strong>Features</strong></h2>
        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4 mb-5">
        <div class="service-1 dark">
          <span class="service-1-icon">
            <span class="icon-home"></span>
          </span>
          <div class="service-1-contents">
            <h3>Lorem ipsum dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
            <p class="mb-0"><a href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-5">
        <div class="service-1 dark">
          <span class="service-1-icon">
            <span class="icon-gear"></span>
          </span>
          <div class="service-1-contents">
            <h3>Lorem ipsum dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
            <p class="mb-0"><a href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-5">
        <div class="service-1 dark">
          <span class="service-1-icon">
            <span class="icon-watch_later"></span>
          </span>
          <div class="service-1-contents">
            <h3>Lorem ipsum dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
            <p class="mb-0"><a href="#">Learn more</a></p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 mb-5">
        <div class="service-1 dark">
          <span class="service-1-icon">
            <span class="icon-verified_user"></span>
          </span>
          <div class="service-1-contents">
            <h3>Lorem ipsum dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
            <p class="mb-0"><a href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-5">
        <div class="service-1 dark">
          <span class="service-1-icon">
            <span class="icon-video_library"></span>
          </span>
          <div class="service-1-contents">
            <h3>Lorem ipsum dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
            <p class="mb-0"><a href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-5">
        <div class="service-1 dark">
          <span class="service-1-icon">
            <span class="icon-vpn_key"></span>
          </span>
          <div class="service-1-contents">
            <h3>Lorem ipsum dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
            <p class="mb-0"><a href="#">Learn more</a></p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h2 class="section-heading"><strong>Testimonials</strong></h2>
        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
      </div>
    </div>
    <div class="row">
        @foreach($testimonials as $testimonial)
        @if($testimonial->published===1)  
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="testimonial-2">
          <blockquote class="mb-4">
            <p>{{$testimonial->content}}</p>
          </blockquote>
          <div class="d-flex v-card align-items-center">
            <img src="{{asset('assets/dashboard/images/testimonials/'.$testimonial->image)}}" alt="Image" class="img-fluid mr-3">
            <div class="author-name">
              <span class="d-block">{{$testimonial->name}}</span>
              <span>{{$testimonial->position}}</span>
            </div>
          </div>
        </div>
      </div>
      @endif
      @endforeach
     
    </div>
  </div>
</div>
@endsection