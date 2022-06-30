
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
           <h1> Create Shipment   </h1> 
                </div>

              </header>
          

              <h5>Shipment Information</h5>
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

<form action="{{route('area.store')}}" method='post'>
    @csrf
<!--fluid-container start-->
<div class="container-fluid">

<label class="col-xs-3">Shipment Type</label> <i class="text-danger">*</i>
    <div class="col-xs-9">
            <div class="form-check">
                <label class="radio-inline">
                    <input type="radio" name="type" value="admin" checked="&quot;checked&quot;">Pickup (For door to door delivery) </label>
                <label class="radio-inline">
                    <input type="radio" name="type" value="branch_manager">Drop off (For delivery from branch directly)</label>
            </div>


<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
    <div class="form-group">
            <label for="exampleFormControlSelect1">Branch</label> <i class="text-danger">*</i>
            <select style="width: 200px" id="nameid">
            <option value=""></option>
            @foreach ($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
  
    </select>

    </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Shipping Date</label> <i class="text-danger">*</i>
    <input name="date" type="date" class="form-control" id="" required>
  </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Collection Time</label> <i class="text-danger">*</i>
    <input name="date" type="time" class="form-control" id="" required>
  </div>
</div>
<!--column end-->
</div>
<!--row end-->

<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
    <div class="form-group">
            <label for="exampleFormControlSelect1">Customer/Sender</label> <i class="text-danger">*</i>
            <select style="width: 200px" id="customer">
            <option value=""></option>
         
                    <option value=""></option>
                
  
    </select>

    </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label"> Customer Phone</label> <i class="text-danger">*</i>
    <input name="phone" type="number" class="form-control" id="" required>
  </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Customer Address</label> <i class="text-danger">*</i>
    <input name="address" type="text" class="form-control" id="" required>
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
    <label for="" class="form-label"> Receiver Name</label> <i class="text-danger">*</i>
    <input name="receiver_name" type="number" class="form-control" id="" required>
  </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label"> Receiver Phone</label> <i class="text-danger">*</i>
    <input name="receiver_phone" type="number" class="form-control" id="" required>
  </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Receiver Address</label> <i class="text-danger">*</i>
    <input name="receiver_address" type="text" class="form-control" id="" required>
  </div>
</div>
<!--column end-->
</div>
<!--row end-->


<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
    <div class="form-group">
            <label for="exampleFormControlSelect1">To Branch</label> <i class="text-danger">*</i>
            <select style="width: 200px" id="to_branch">
            <option value=""></option>
            @foreach ($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
  
    </select>

    </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="form-group">
            <label for="exampleFormControlSelect1">To Area</label> <i class="text-danger">*</i>
            <select style="width: 200px" id="to_area">
            <option value=""></option>
            
                    <option value=""></option>
                   
  
    </select>

    </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="form-group">
            <label for="exampleFormControlSelect1">From Area</label> <i class="text-danger">*</i>
            <select style="width: 200px" id="from_area">
            <option value=""></option>
           
                    <option value=""></option>
                 
  
    </select>

    </div>
</div>
<!--column end-->
</div>
<!--row end-->


<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
    <div class="form-group">
            <label for="exampleFormControlSelect1">Payment Type</label> <i class="text-danger">*</i>
            <select name="payment_type" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select Payment Option</option>
        
                    <option>Prepaid</option>
                    <option>Postpaid</option>
            
            </select>
    </div>

    </div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="form-group">
            <label for="exampleFormControlSelect1">Payment Method</label> <i class="text-danger">*</i>
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
            <option>Select Payment Method</option>
        
                    <option value="cash_payment">Cash Payment</option>
                    <option value="due_payment">Due Payment</option>
                    <option value="invoice_payment">Invoice Payment</option>
            
            </select>
    </div>
</div>
<!--column end-->
</div>
<!--row end-->
<br><br><br>

<h5>Product Information</h5>

<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label"> Product Description</label> <i class="text-danger">*</i>
    <input name="product_description" type="text" class="form-control" id="" required>
  </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label"> Quantity</label> <i class="text-danger">*</i>
    <input name="quantity" type="number" class="form-control" id="" required>
  </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Shipping Cost</label> <i class="text-danger">*</i>
    <input name="shipping_cost" type="text" class="form-control" id="" required>
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




<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">

      $("#nameid").select2({
            placeholder: "Select a Branch",
            allowClear: true
        });

        $("#customer").select2({
            placeholder: "Select a Customer",
            allowClear: true
        });

        $("#to_branch").select2({
            placeholder: "Select a Customer",
            allowClear: true
        });

        $("#to_area").select2({
            placeholder: "Select a Customer",
            allowClear: true
        });

        $("#from_area").select2({
            placeholder: "Select a Customer",
            allowClear: true
        });
</script>
        

        </div>
        
        @endsection
