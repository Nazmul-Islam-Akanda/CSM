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
           <h1> Create Branch   </h1> 
                </div>

              </header>
          
<!-- error message -->
@if($errors->any())
<div class='alert alert-danger' role="alert">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<!-- error message -->

<form action="{{route('branch.store')}}" method='post'>
    @csrf
<!--fluid-container start-->
<div class="container-fluid">
<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Branch Name</label> <i class="text-danger">*</i>
    <input name="name" placeholder='Enter branch name' type="string" class="form-control" id="" required>
  </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Email</label> <i class="text-danger">*</i>
    <input name="email" placeholder='Enter a valid email' type="email" class="form-control" id="" required>
  </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;
<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Owner National ID</label> <i class="text-danger">*</i>
    <input name="owner_nid" placeholder='Enter valid nid' type="number" class="form-control" id="" required>
  </div>
</div>
<!--column end-->
</div>
<!--row end-->

<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Address</label> <i class="text-danger">*</i>
    <input name="address" placeholder='Enter branch address' type="string" class="form-control" id="" required>
  </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;
<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Owner Name</label> <i class="text-danger">*</i>
    <input name="owner_name" placeholder='' type="string" class="form-control" id="" required>
  </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;
<div class="col-md-3">
<div class="mb-3">
<label for="" class="form-label">Owner Phone</label> <i class="text-danger">*</i>
    <input name="owner_phone" placeholder='' type="number" class="form-control" id="" required>
  </div>
</div>
<!--column end-->
</div>
<!--row end-->

<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Shipment ID Prefix</label> <i class="text-danger">*</i>
    <input name="ship_prefix" placeholder='Enter shipment id prefix for your branch' type="string" class="form-control" id="" required>
  </div>
</div>
<!--column end-->
</div>
<!--row end-->


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<!--fluid-container end-->




              

        </div>
        
        @endsection