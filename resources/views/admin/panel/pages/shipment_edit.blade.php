
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
           <h1> Edit Shipment   </h1> 
                </div>

              </header>
          

              <h5>Shipment Information</h5>



<form action="{{route('shipment.update',$shipment->id)}}" method='post'>
    @method('put')
    @csrf
<!--fluid-container start-->
<div class="container-fluid">

<label class="col-xs-3">Shipment Type</label> <i class="text-danger">*</i>
    <div class="col-xs-9">
            <div class="form-check">
                    <label class="radio-inline">
                <input type="radio" name="type"  {{ ($shipment->type) == 'Door to Door' ? 'checked' : '' }}  value="Door to Door" >Pickup (For door to door delivery)</label>
                <label class="radio-inline">
                <input type="radio" name="type"  {{ ($shipment->type) == 'Branch to Branch' ? 'checked' : '' }}  value="Branch to Branch" >Drop off (For delivery from branch directly)</label>
            </div>


<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
    <div class="form-group">
            <label for="exampleFormControlSelect1">Branch</label> <i class="text-danger">*</i><br>
            <select name="branch" onchange="getCustomerArea(this.value)" style="width: 200px" id="nameid">

            @foreach ($branches as $branch)  
                    <option
                    @if($branch->id==$shipment->branch_id)
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
    <label for="" class="form-label">Shipping Date</label> <i class="text-danger">*</i>
    <input name="date" value="{{$shipment->date}}" type="date" class="form-control" id="" required>
  </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Collection Time</label> <i class="text-danger">*</i>
    <input name="time" value="{{$shipment->time}}" type="time" class="form-control" id="" required>
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
            <label for="exampleFormControlSelect1">Customer/Sender</label> <i class="text-danger">*</i> <a href="{{route('customer.add')}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M4 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm7 8H7v2h4v4h2v-4h4v-2h-4V7h-2v4z"/></svg>Add</a>
            <select name="customer" onchange="getCustomerData(this.value)" id="customer" style="width: 200px" class="customer">    
            
            <option value="{{$shipment->customer_id}}">{{$shipment->customer->name}}</option>

    </select>

    </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label"> Customer Phone</label> <i class="text-danger">*</i>
    <input type="number" value="{{$shipment->customer->phone}}" class="form-control" id="phone" >
  </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Customer Address</label> <i class="text-danger">*</i>
    <input  type="text" value="{{$shipment->customer->address}}" class="form-control" id="address">
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
    <input name="receiver_name" value="{{$shipment->receiver_name}}" type="text" class="form-control" id="" required>
  </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label"> Receiver Phone</label> <i class="text-danger">*</i>
    <input name="receiver_phone" value="{{$shipment->receiver_phone}}" type="number" class="form-control" id="" required>
  </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Receiver Address</label> <i class="text-danger">*</i>
    <input name="receiver_address" value="{{$shipment->receiver_address}}" type="text" class="form-control" id="" required>
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
            <label for="exampleFormControlSelect1">To Branch</label> <i class="text-danger">*</i><br>
            <select name="to_branch" onchange="getToArea(this.value)" style="width: 200px" id="to_branch">
           
                    @foreach ($branches as $branch)  
                    <option
                    @if($branch->id==$shipment->to_branch_id)
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
            <label for="exampleFormControlSelect1">To Area</label> <i class="text-danger">*</i><br>
            <select name="to_area" style="width: 200px" class="to_area" id="to_area">
          
            @foreach ($areas as $area)  
                    <option
                    @if($area->id==$shipment->to_area_id)
                    selected
                    @endif 
                    value="{{$area->id}}">{{$area->area}}</option>
                    @endforeach 
  
    </select>

    </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="form-group">
            <label for="exampleFormControlSelect1">From Area</label> <i class="text-danger">*</i><br>
            <select name="from_area" id="from_area" style="width: 200px" class="from_area_search">
           
            @foreach ($areas as $area)  
                    <option
                    @if($area->id==$shipment->from_area_id)
                    selected
                    @endif 
                    value="{{$area->id}}">{{$area->area}}</option>
                    @endforeach   
  
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

                    <option {{ ($shipment->pay_type) == 'Prepaid' ? 'selected' : '' }}  value="Prepaid">Prepaid</option>
            <option {{ ($shipment->pay_type) == 'Postpaid' ? 'selected' : '' }}  value="Postpaid">Postpaid</option>
            
            </select>
    </div>

    </div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="form-group">
            <label for="exampleFormControlSelect1">Payment Method</label> <i class="text-danger">*</i>
            <select name="pay_method" class="form-control" id="exampleFormControlSelect1">

                    <option {{ ($shipment->pay_method) == 'Cash Payment' ? 'selected' : '' }}  value="Cash Payment">Cash Payment</option>
            <option {{ ($shipment->pay_method) == 'Due Payment' ? 'selected' : '' }}  value="Due Payment">Due Payment</option>
            <option {{ ($shipment->pay_method) == 'Invoice Payment' ? 'selected' : '' }}  value="Invoice Payment">Invoice Payment</option>
            
            </select>
    </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">

</div>
<!--column end-->
</div>
<!--row end-->



<label for="serial_no" class="col-xs-3 col-form-label">Shipment ID <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <div id="serial_preview">
                                        <div type="button" class="btn btn-success disabled btn-sm">id</div>
                                        <div type="button" class="btn btn-success disabled btn-sm">id</div>
                                        <div type="button" class="btn btn-success disabled btn-sm">id</div>.........
                                        <div type="button" class="slbtn btn btn-success disabled btn-sm">id</div>

                                    </div>
                                    <input type="hidden" name="schedule_id" id="schedule_id">
                                    <input type="hidden" name="serial_no" id="serial_no">
                                </div>
                            </div>

 <br><br>

<label class="col-xs-3">Shipment Direction</label> <i class="text-danger">*</i>
    <div class="col-xs-9">
            <div class="form-check">
                    <label class="radio-inline">
                <input type="radio" name="shipment_direction"  {{ ($shipment->shipment_direction) == 'on_delivery' ? 'checked' : '' }}  value="on_delivery" >On Delivery</label>
                <label class="radio-inline">
                <input type="radio" name="shipment_direction"  {{ ($shipment->shipment_direction) == 'return' ? 'checked' : '' }}  value="return" >Return</label>
            </div>



<br><br><br>

<h5>Product Information</h5>

<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label"> Product Description</label> <i class="text-danger">*</i>
    <input name="product_description" value="{{$shipment->product_description}}" type="text" class="form-control" id="" required>
  </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label"> Quantity</label> <i class="text-danger">*</i>
    <input name="quantity" value="{{$shipment->quantity}}" type="number" class="form-control" id="" required>
  </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Shipping Cost</label> <i class="text-danger">*</i>
    <input name="shipping_cost" value="{{$shipment->shipping_cost}}" type="text" class="form-control" id="" required>
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




<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">

      $("#nameid").select2({
            placeholder: "Select a Branch",
            allowClear: true
        });

        $(".customer").select2({
            placeholder: "Select a Customer",
            allowClear: true
        });

        $("#to_branch").select2({
            placeholder: "Select a branch",
            allowClear: true
        });

        $(".to_area").select2({
            placeholder: "Select a area",
            allowClear: true
        });

        $(".from_area_search").select2({
            placeholder: "Select a area",
            allowClear: true
        });
</script>
        

        </div>


        <script>
  //Customers under branch
  function getCustomerArea(branch){
            $("#customer").empty();
            $("#from_area").empty();
            $.ajax({
                url: 'http://csm.test/admin/customer-list/' + branch,
                context: document.body,
                success: function (response){

                    for ( customer of response.data ){
                        console.log(customer.name)
                        $("#customer").append("<option value="+customer.id+" ?? '' >"+customer.name+"</option>")
                    }
                   
                }
            });

            $.ajax({
                url: 'http://csm.test/admin/area-list/' + branch,
                context: document.body,
                success: function (response){

                    for ( area of response.data ){
                        console.log(area.area)
                        $("#from_area").append("<option value="+area.id+" ?? '' >"+area.area+"</option>")
                    }
                   
                }
            });

        }


 //customer phone and address under customer
 function getCustomerData(customer){
            $("#phone").empty();
            $("#address").empty();
            $.ajax({
                url: 'http://csm.test/admin/customer-phone-address/' + customer,
                context: document.body,
                success: function (response){
                  // console.log(response.data)
                  for ( phone of response.data ){
                        console.log(phone.phone)
                        $('#phone').val(phone.phone);
                    }

                    for ( phone of response.data ){
                        console.log(phone.phone)
                        $('#address').val(phone.address);
                    }
                     
                }

                
            });
        }    



         //To Area under To Branch
 function getToArea(branch){
            $("#to_area").empty();
            $.ajax({
                url: 'http://csm.test/admin/area-list/' + branch,
                context: document.body,
                success: function (response){
                  // console.log(response.data)
                  for ( area of response.data ){
                        console.log(area.area)
                        $("#to_area").append("<option value="+area.id+" ?? '' >"+area.area+"</option>")
                    }
                     
                }

                
            });
        }  
        
</script>
        
        @endsection
