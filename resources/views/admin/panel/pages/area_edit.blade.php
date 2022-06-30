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
           <h1> Edit Area   </h1> 
                </div>

              </header>


<form action="{{route('area.update',$area->id)}}" method='post'>
    @method('put')
    @csrf
<!--fluid-container start-->
<div class="container-fluid">
<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
    <div class="form-group">
            <label for="exampleFormControlSelect1">Branch</label> <i class="text-danger">*</i>
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
            @foreach ($branches as $branch)
                    <option 
                    @if($branch->id == $area->branch_id)
                    selected
                    @endif
                    value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
            </select>
    </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Area</label> <i class="text-danger">*</i>
    <input name="area" value="{{$area->area}}" placeholder='Enter a valid area' type="text" class="form-control" id="" required>
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