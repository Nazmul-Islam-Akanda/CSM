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
           <h1> Edit Driver   </h1> 
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

<form action="{{route('driver.update',$driver->id)}}" method='post'>
    @method('put')
    @csrf
<!--fluid-container start-->
<div class="container-fluid">
<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
    @if(auth()->user()->role=="admin")
    <div class="form-group">
            <label for="exampleFormControlSelect1">Branch</label> <i class="text-danger">*</i>
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
            @foreach ($branches as $branch)  
                    <option
                    @if($branch->id==$driver->branch_id)
                    selected
                    @endif 
                    value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach 
            </select>
    </div>
    @endif
    @if(auth()->user()->role=="branch_manager")
    <div class="form-group">
            <label for="exampleFormControlSelect1">Branch</label> <i class="text-danger">*</i>
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
          
                    <option selected value="{{auth()->user()->branch_id}}">{{auth()->user()->branch->name}}</option>
      
            </select>
    </div>
    @endif
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Driver Name</label> <i class="text-danger">*</i>
    <input name="name" value="{{$driver->name}}" placeholder='Enter driver name' type="text" class="form-control" id="" required>
  </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Driver Phone</label> <i class="text-danger">*</i>
    <input name="phone" value="{{$driver->phone}}" placeholder='Contact no.' type="number" class="form-control" id="" required>
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
    <label for="" class="form-label">Driver NID</label> <i class="text-danger">*</i>
    <input name="n_id" value="{{$driver->n_id}}" placeholder='National ID' type="number" class="form-control" id="" required>
  </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Driver address</label> <i class="text-danger">*</i>
    <input name="address" value="{{$driver->address}}" placeholder='Address of the driver' type="text" class="form-control" id="" required>
  </div>
</div>
<!--column end-->
</div>
<!--row end-->
</div>

  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
<!--fluid-container end-->




              

        </div>
        
        @endsection