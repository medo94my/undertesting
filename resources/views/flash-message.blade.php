

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
  
{{-- <div aria-live="polite" aria-atomic="true"  style="position: relative; ">
    <div class="toast" data-delay="2000" data-animation="true" style="position: absolute; top: 0; right: 5px; min-width:300px">
      <div class="toast-header  bg-dark">
        <i class="far fa-check-circle text-success mx-2"></i>
        <strong class="mr-auto text-light">Success</strong>
        {{-- <small>11 mins ago</small> 
        <button type="button" class="ml-2 mb-1 close text-light" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body alert-success">
        {{Session::get('success')}}
        {{$message}}
      </div>
    </div>
  </div> --}}
@endif
  
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
{{-- <div aria-live="polite" aria-atomic="true"  style="position: relative; ">
    <div class="toast"   data-delay="2000" data-animation="true" style="position: absolute; top: 0; right: 5px; min-width:300px">
      <div class="toast-header  bg-dark">
        <i class="fas fa-times text-danger mx-2"></i>
        <strong class="mr-auto text-light">Error</strong>
        {{-- <small>11 mins ago</small> 
        <button type="button" class="ml-2 mb-1 close text-light" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body alert-danger">
        {{$message}}
      </div>
    </div>
  </div> --}}
@endif
   
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
{{-- <div aria-live="polite " aria-atomic="true"  style="position: relative; ">
    <div class="toast  "  data-delay="2000" data-animation="true" style="position: absolute; top: 0; right: 5px; min-width:300px">
      <div class="toast-header bg-dark">
        <i class="fas fa-exclamation-circle mx-2 text-warning"></i>
        <strong class="mr-auto text-light">Warning</strong>
        {{-- <small>11 mins ago</small> 
        <button type="button" class="ml-2 mb-1 close text-light" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body alert-warning">
        {{$message}}
      </div>
    </div>
  </div> --}}
@endif
   
@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
{{-- <div aria-live="polite" aria-atomic="true"  style="position: relative; ">
    <div class="toast" data-delay="2000" data-animation="true" style="position: absolute; top: 0; right: 5px; min-width:300px">
      <div class="toast-header  bg-dark">
        <i class="fas fa-info-circle mx-2 text-info"></i>
        <strong class="mr-auto text-light">Info</strong>
        <small>11 mins ago</small>
        <button type="button" class="ml-2 mb-1 close text-light" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body alert-info">
        {{$message}}
      </div>
    </div>
  </div> --}}
@endif
  
@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    Please check the form below for errors
</div>
{{-- <div aria-live="polite" aria-atomic="true"  style="position: relative; ">
    <div class="toast" data-delay="2000"  data-animation="true" style="position: absolute; top: 0; right: 5px; min-width:300px">
      <div class="toast-header  bg-dark">
        <i class="fas fa-times text-danger mx-2"></i>
        <strong class="mr-auto text-light">Somthing Wrong</strong>
        <small>11 mins ago</small>
        <button type="button" class="ml-2 mb-1 close text-light" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body alert-danger">
        {{$message}}
      </div>
    </div>
  </div> --}}
@endif

