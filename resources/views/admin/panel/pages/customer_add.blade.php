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
           <h1> Create Customer   </h1> 
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

<form action="{{route('customer.store')}}" method='post'>
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
            <select name="branch" onclick="getArea(this.value)" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
            @foreach ($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
            </select>
    </div>
    @endif
    @if(auth()->user()->role=="branch_manager")
    <div class="form-group">
            <label for="exampleFormControlSelect1">Branch</label> <i class="text-danger">*</i>
            <select name="branch" onclick="getArea(this.value)" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
            
                    <option value="{{auth()->user()->branch_id}}">{{auth()->user()->branch->name}}</option>
                   
            </select>
    </div>
    @endif
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">

<div class="form-group">
            <label for="exampleFormControlSelect1">Area</label> <i class="text-danger">*</i>
            <br>
            <select name="area" id="area" style="width: 200px" class="area">
            
  
    </select>

    </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">

<div class="mb-3">
    <label for="" class="form-label">Customer Name</label> <i class="text-danger">*</i>
    <input name="name" placeholder='Full Name' type="text" class="form-control" id="" required>
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
    <label for="" class="form-label">Customer Email</label>
    <input name="email" placeholder='Email adreess' type="email" class="form-control" id="" required>
  </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">

<div class="mb-3">
    <label for="" class="form-label">Customer NID</label> 
    <input name="n_id" placeholder='National ID' type="number" class="form-control" id="" required>
  </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">

<div class="mb-3">
    <label for="" class="form-label">Customer Phone</label> <i class="text-danger">*</i>
    <input name="phone" placeholder='Contact Number' type="number" class="form-control" id="" required>
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
    <label for="" class="form-label">Customer Address</label>
    <input name="address" placeholder='Address' type="text" class="form-control" id="" required>
  </div>
</div>
<!--column end-->
</div>
<!--row end-->

</div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<!--fluid-container end-->

        </div>


        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<script type="text/javascript">

      $(".area").select2({
            placeholder: "Select a area",
            allowClear: true
        });

</script>



<script>
  //area under branch
  function getArea(branch){
            $("#area").empty();
            $.ajax({
                url: 'https://csm.test/admin/area-list/' + branch,
                context: document.body,
                success: function (response){

                    for ( area of response.data ){
                        console.log(area.area)
                        $("#area").append("<option value="+area.id+" ?? '' >"+area.area+"</option>")
                    }
                }
            });
        }
</script>
        
        @endsection