
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
     
                </div>

              </header>


   
              <!--row start-->
              <div id="divToPrint">
<div class="row">
    <!--column start-->
    
    &nbsp;&nbsp;&nbsp; <h1> Shipment Invoice  </h1> 
    

<div class="col-md-3">

</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<img src="{{url('/storage/uploads/'.$info->logo)}}" width='100px' alt="Logo">
        <p><b>{{$info->name}}</b></p>      
</div>
<!--column end-->
</div>
<!--row end-->


      


              <h5>Shipment Information <i class="text-danger">*</i></h5>

              <br>


<!--fluid-container start-->
<div class="container-fluid">

<p><b>Shipment ID:</b> {{$shipment->shipment_id}}</p>

<p><b>Shipment Type:</b> {{$shipment->type}}</p>


<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
    <p><b>Branch:</b> {{$shipment->branch->name}}</p>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<p><b>Shipping Date:</b> {{$shipment->date}}</p>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<p><b>Collection Time:</b> {{$shipment->time}}</p>
</div>
<!--column end-->
</div>
<!--row end-->

<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
    <p><b>Customer/Sender:</b> {{$shipment->customer->name}}</p>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<p><b>Customer Phone:</b> {{$shipment->customer->phone}}</p>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<p><b>Customer Address:</b> {{$shipment->customer->address}}</p>
</div>
<!--column end-->
</div>
<!--row end-->


<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
    <p><b>Receiver Name:</b> {{$shipment->receiver_name}}</p>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<p><b>Receiver Phone:</b> {{$shipment->receiver_phone}}</p>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<p><b>Receiver Address:</b> {{$shipment->receiver_address}}</p>
</div>
<!--column end-->
</div>
<!--row end-->


<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
    <p><b>To Branch:</b> {{$shipment->toBranch->name}}</p>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<p><b>To Area:</b> {{$shipment->toArea->area}}</p>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<p><b>From Area:</b> {{$shipment->fromArea->area}}</p>
</div>
<!--column end-->
</div>
<!--row end-->


<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
    <p><b>Payment Type:</b> {{$shipment->payment_type}}</p>

    </div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<p><b>Payment Method:</b> {{$shipment->pay_method}}</p>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<p><b>Payment Status:</b> {{$shipment->pay_status}}</p>
</div>
<!--column end-->
</div>
<!--row end-->



<br><br>

<h5>Product Information</h5>
<br>
<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
    <p><b>Product Description:</b> {{$shipment->product_description}}</p>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<p><b>Quantity:</b> {{$shipment->quantity}}</p>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<p><b>Shipping Cost:</b> {{$shipment->shipping_cost}}</p>
</div>
<!--column end-->
</div>
<!--row end-->
</div>

</div>

<br><br>
<a onClick="PrintDiv('divToPrint')" value="Print" class="btn" style="background-color:#FDB748; border-radius:10px">Print</a>
      &nbsp;
      <a href="{{route('shipment.list')}}" class="btn" style="background-color:#EFD8AE; border-radius:10px">Back</a>
</div>
<!--fluid-container end-->


<script language="javascript">
    function PrintDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
        
        @endsection
