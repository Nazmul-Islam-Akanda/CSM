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

<form action="{{route('transaction.income.store')}}" method='post'>
    @csrf
<!--fluid-container start-->
<div class="container-fluid">
<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
    <div class="form-group">
            <label for="exampleFormControlSelect1">Beneficiary Branch</label> <i class="text-danger">*</i>
            <select name="branch" onclick="getCustomer(this.value)" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
            @foreach ($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
            </select>
    </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">

<div class="form-group">
            <label for="exampleFormControlSelect1">From Customer</label>
            <br>
            <select name="customer" id="customer" onchange="getCustomerData(this.value)" style="width: 200px" class="customer">
            
  
    </select>

    </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">

<div class="mb-3">
    <label for="" class="form-label">Customer NID</label> 
    <input  placeholder='National ID' type="number" class="form-control" id="nid">
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
            <label for="exampleFormControlSelect1">From Branch</label>
            <select name="from_branch" onclick="getShipment(this.value)" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
            @foreach ($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
            </select>
    </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">


<div class="form-group">
            <label for="exampleFormControlSelect1">From Shipment</label> 
            <br>
            <select name="shipment_id" id="shipment" style="width: 200px" class="shipment">
            
  
    </select>

    </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Income Amount</label> <i class="text-danger">*</i>
    <input name="amount" placeholder='Enter your income' type="number" class="form-control" id="nid" required>
  </div>
</div>
<!--column end-->
</div>
<!--row end-->


<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-11">
    <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <textarea name="description" id="description" class="form-control mb-5" cols="30" rows="3" placeholder="Description"></textarea>
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

      $(".customer").select2({
            placeholder: "Select a customer",
            allowClear: true
        });

        $(".shipment").select2({
            placeholder: "Select a shipping id",
            allowClear: true
        });

</script>



<script>
  //area under branch
  function getCustomer(branch){
            $("#customer").empty();
            $.ajax({
                url: 'http://csm.test/admin/customer-list/' + branch,
                context: document.body,
                success: function (response){
                    $("#customer").append("<option value="+''+">"+'Select Customer'+"</option>")
                    for ( customer of response.data ){
                        console.log(customer.name)
                        $("#customer").append("<option value="+customer.id+" ?? '' >"+customer.name+"</option>")
                    }
                }
            });
        }

         //customer n_id under customer
 function getCustomerData(customer){
            $("#nid").empty();
            $.ajax({
                url: 'http://csm.test/admin/customer-phone-address/' + customer,
                context: document.body,
                success: function (response){
                  // console.log(response.data)
                  for ( nid of response.data ){
                        console.log(nid.n_id)
                        $('#nid').val(nid.n_id);
                    }
                     
                }

                
            });
        }   


        //shipment under branch
  function getShipment(fromBranch){
            $("#shipment").empty();
            $.ajax({
                url: 'http://csm.test/admin/shipment-list/' + fromBranch,
                context: document.body,
                success: function (response){
                    $("#shipment").append("<option value="+''+">"+'Select Sphipment'+"</option>")
                    for ( shipment of response.data ){
                        console.log(shipment.shipment_id)
                        $("#shipment").append("<option value="+shipment.id+" ?? '' >"+shipment.shipment_id+"</option>")
                    }
                }
            });
        }
</script>
        
        @endsection