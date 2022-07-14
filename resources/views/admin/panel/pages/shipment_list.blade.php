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
           <h1>Shipment list  </h1> 
                </div>
               
              </header>


<!--row start-->
<div class="row">
    <!--column start-->
<div class="col-md-3">
<a href="{{ route('shipment.add') }}"><button class="btn btn-primary">Create Shipment</button></a>
</div>

<div class="col-md-3">
<form action="{{route('shipment.list')}}" method="get" style="display:flex">
  <input style="border:#BBBDBF; border-width:2px; border-style:solid" type="text" class="form-control" name="search" placeholder="Search here...">
<button type="submit" class=""><svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M16 2l5 5v14.008a.993.993 0 0 1-.993.992H3.993A1 1 0 0 1 3 21.008V2.992C3 2.444 3.445 2 3.993 2H16zm-2.471 12.446l2.21 2.21 1.415-1.413-2.21-2.21a4.002 4.002 0 0 0-6.276-4.861 4 4 0 0 0 4.861 6.274zm-.618-2.032a2 2 0 1 1-2.828-2.828 2 2 0 0 1 2.828 2.828z" fill="rgba(178,90,12,1)"/></svg></button>
</form>
</div>
<!--column end-->
</div>
<!--row end-->

@if($key)
<h3>You are searching for {{$key}}--Found {{$shipments->count()}} result </h3>
@endif
            
              <form action="{{route('multi.shipment')}}" method="POST">
                @csrf

              <table class="table table-bordered table-striped">
  <thead>
    <tr style='background-color:#00ffff'>
    <th scope="col">Check Item</th>
      <th scope="col">Shipment ID</th>
      <th scope="col">Shipment Type</th>
      <th scope="col">Branch</th>
      <th scope="col">Shipping Date </th>
      <th scope="col">Customer/Sender</th>
      <th scope="col">To Branch</th>
      <th scope="col">Payment Method</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Product Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Shipping Cost</th>
      <th scope="col">Status</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>


 @foreach($shipments as $key=>$shipment)  
 @if(auth()->user()->branch_id==$shipment->branch_id || auth()->user()->branch_id==$shipment->to_branch_id || auth()->user()->role=="admin")
    <tr>
    <td>
      <input type="checkbox" name="ids[{{ $shipment->id }}]" value="{{$shipment->id}}" >
    </td>
      <td>{{$shipment->shipment_id}}</td>
      <td>{{$shipment->type}}</td>
      <td>{{$shipment->branch->name ?? ""}}</td>
      <td>{{$shipment->date}}</td>
      <td>{{$shipment->customer->name ?? ""}}</td>
      <td>{{$shipment->tobranch->name ?? ""}}</td>
      <td>{{$shipment->pay_method}}</td>
      <td>{{$shipment->pay_status}}</td>
      <td>{{$shipment->product_description}}</td>
      <td>{{$shipment->quantity}}</td>
      <td>{{$shipment->shipping_cost}}</td>
      <td>{{$shipment->status}}</td>
      <td>
      <a href="{{route('shipment.details',$shipment->id)}}"><svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M9 2.003V2h10.998C20.55 2 21 2.455 21 2.992v18.016a.993.993 0 0 1-.993.992H3.993A1 1 0 0 1 3 20.993V8l6-5.997zM5.83 8H9V4.83L5.83 8zM11 4v5a1 1 0 0 1-1 1H5v10h14V4h-8z" fill="rgba(149,161,6,1)"/></svg></a>
        <a href="{{route('shipment.edit',$shipment->id)}}"><svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-2 2H5v14h14V9.243l2-2V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z" fill="rgba(230,126,34,1)"/></svg></a>
    <a href="{{route('shipment.delete',$shipment->id)}}"><svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" fill="rgba(231,76,60,1)"/></svg></a>
      </td>
    </tr>
    @endif
 @endforeach
  </tbody>
</table>
{{$shipments->links('pagination::bootstrap-5')}}

<label class="col-xs-3">Payment Status</label> <i class="text-danger">*</i>
    <div class="col-xs-9">
            <div class="form-check">
                <label class="radio-inline">
                    <input type="radio" name="payment_status" value="Paid" checked="&quot;checked&quot;">Paid </label>
                <label class="radio-inline">
                    <input type="radio" name="payment_status" value="Unpaid" >Unpaid</label>
            </div>
<button type="submit" class="btn btn" style="background-color:#A2FF33; color:black" ><b>Update Status</b></button>

              </form>
              





</div>

              

        </div>
        
        @endsection