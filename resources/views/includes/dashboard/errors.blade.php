<div class="col-12 mb-2">
    @if (session('fail'))
             <div class="alert alert-danger text-center w-50 m-auto">{{session('fail')}}</div>
             @endif
    </div>