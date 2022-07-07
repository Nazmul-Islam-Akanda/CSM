@extends('admin.panel.master')
     
     @section('content')
     
     
     <!-- .app-main -->
      <main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
              <!-- .page-title-bar -->
              <header class="page-title-bar">
                <div class="d-flex flex-column flex-md-row">
                <a href="{{route('transaction.income.list')}}" class="btn" style="background-color:lightgray; border-radius:10px"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 9V8l-4 4 4 4v-3h4v-2h-4z" fill="rgba(34,128,123,1)"/></svg></a>  &nbsp;&nbsp;   <h1> Add Income   </h1> 
                </div>

              </header>

          


              <!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-2">
    <a href="{{route('transaction.income.add.from.customer')}}" class="btn" style="background-color:bisque; border-radius:10px"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z" fill="rgba(12,139,27,1)"/></svg></a>
              <p><b>From Customer</b></p>
</div>


<div class="col-md-2">
<a href="{{route('transaction.income.add.from.branch')}}" class="btn" style="background-color:bisque; border-radius:10px"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z" fill="rgba(12,139,27,1)"/></svg></a>
              <p><b>From Branch</b></p>
</div>
<!--column end-->
</div>
<!--row end-->


        </div>
        </div>


       
        
        @endsection