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
           <h1>Return Shipment list  </h1> 
                </div>
                <a href="{{ route('shipment.add') }}"><button class="btn btn-primary">Create Shipment</button></a>
              </header>

            
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
        <a href="{{route('shipment.edit',$shipment->id)}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-2 2H5v14h14V9.243l2-2V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z" fill="rgba(230,126,34,1)"/></svg></a>
    <a href="{{route('shipment.delete',$shipment->id)}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" fill="rgba(231,76,60,1)"/></svg></a>
      </td>
    </tr>
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