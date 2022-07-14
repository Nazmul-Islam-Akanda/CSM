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
           <h1> Edit Customer   </h1> 
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

<form action="{{route('customer.update',$customer->id)}}" method='post'>
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
            <select name="branch" onclick="getArea(this.value)" class="form-control" id="exampleFormControlSelect1">
            <option value="null">Select branch</option>
            @foreach ($branches as $branch)  
                    <option
                    @if($branch->id==$customer->branch_id)
                    selected
                    @endif 
                    value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach 
            </select>
    </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">

<div class="form-group">
            <label for="exampleFormControlSelect1">Area</label> <i class="text-danger">*</i>
            <br>
            <select name="area" id="area" style="width: 200px" class="area">
            <option value="{{$customer->area_id}}">{{$customer->area->area}}</option>
  
    </select>

    </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">

<div class="mb-3">
    <label for="" class="form-label">Customer Name</label> <i class="text-danger">*</i>
    <input name="name" value="{{$customer->name}}" placeholder='Full Name' type="text" class="form-control" id="" required>
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
    <input name="email" value="{{$customer->email}}" placeholder='Email adreess' type="email" class="form-control" id="" required>
  </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">

<div class="mb-3">
    <label for="" class="form-label">Customer NID</label> 
    <input name="n_id" value="{{$customer->n_id}}" placeholder='National ID' type="number" class="form-control" id="" required>
  </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">

<div class="mb-3">
    <label for="" class="form-label">Customer Phone</label> <i class="text-danger">*</i>
    <input name="phone" value="{{$customer->phone}}" placeholder='Contact Number' type="number" class="form-control" id="" required>
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
    <input name="address" value="{{$customer->address}}" placeholder='Address' type="text" class="form-control" id="" required>
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