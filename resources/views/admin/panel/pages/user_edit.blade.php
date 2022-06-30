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
           <h1> Edit User   </h1> 
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

<form action="{{route('user.update',$user->id)}}" method='post'>

@method('put')
    @csrf
<!--fluid-container start-->
<div class="container-fluid">
<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Full Name</label> <i class="text-danger">*</i>
    <input name="name" value="{{$user->name}}" placeholder='Enter user name' type="string" class="form-control" id="" required>
  </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Email</label> <i class="text-danger">*</i>
    <input name="email" value="{{$user->email}}" placeholder='Enter a valid email' type="email" class="form-control" id="" required>
  </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<!--column end-->
</div>
<!--row end-->

<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
    <label class="col-xs-3">User Type</label> <i class="text-danger">*</i>
    <div class="col-xs-9">
            <div class="form-check">
                <label class="radio-inline">
                <input type="radio" name="role"  {{ ($user->role) == 'admin' ? 'checked' : '' }}  value="admin" >Admin</label>
                <label class="radio-inline">
                <input type="radio" name="role"  {{ ($user->role) == 'branch_manager' ? 'checked' : '' }}  value="branch_manager" >Branch Manager</label>
            </div>
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
    <label for="" class="form-label">Phone</label> <i class="text-danger">*</i>
    <input name="phone" value="0{{$user->phone}}" placeholder='Enter user contact no.' type="number" class="form-control" id="" required>
  </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">National ID</label> <i class="text-danger">*</i>
    <input name="n_id" value="{{$user->n_id}}" placeholder='' type="number" class="form-control" id="" required>
  </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="form-group">
            <label for="exampleFormControlSelect1">Branch</label> <i class="text-danger">*</i>
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
            <option value="null">Select branch</option>
            @foreach ($branches as $branch)  
                    <option
                    @if($branch->id==$user->branch_id)
                    selected
                    @endif 
                    value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach 
            </select>
    </div>
</div>

<!--column end-->
</div>
<!--row end-->


  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
<!--fluid-container end-->

</div>


              

        </div>
        
        @endsection