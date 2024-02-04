  
    
  </div>
</div>

  <!-- jQuery -->
  <script src="{{asset('assets/dashboard/vendors/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
 <script src="{{asset('assets/dashboard/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('assets/dashboard/vendors/fastclick/lib/fastclick.js')}}"></script>
  <!-- NProgress -->
  <script src="{{asset('assets/dashboard/vendors/nprogress/nprogress.js')}}"></script>
  <!-- iCheck -->
  <script src="{{asset('assets/dashboard/vendors/iCheck/icheck.min.js')}}"></script>
  <!-- Datatables -->
  <script src="{{asset('assets/dashboard/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/jszip/dist/jszip.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

  <!-- Custom Theme Scripts -->
  <script src="{{asset('assets/dashboard/build/js/custom.min.js')}}"></script>

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
  @yield('js')
 
</body>
</html>