</div>

<script src="{{asset('assets/website/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/website/js/popper.min.js')}}"></script>
<script src="{{asset('assets/website/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/website/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/website/js/jquery.sticky.js')}}"></script>
<script src="{{asset('assets/website/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/website/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('assets/website/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('assets/website/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('assets/website/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/website/js/aos.js')}}"></script>

<script src="{{asset('assets/website/js/main.js')}}"></script>
   {{-- toastr --}}
   <script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
 
   <script>
      @if(Session::has('message_id'))
      var type ="{{Session::get('alert-type','info')}}"
      switch(type){
          case'info':
          toastr.info("{{Session::get('message_id')}}");
          
          break;
  
           case'success':
          toastr.success("{{Session::get('message_id')}}");
          break;
  
          case'warning':
          toastr.warning ("{{Session::get('message_id')}}");
          break;
  
           case'error':
          toastr.error ("{{Session::get('message_id')}}");
          break;
      }
  
  @endif
  </script>

</body>

</html>