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
           <h1>Shipment Report  </h1> 
                </div>
               
              </header>



<!--row start-->
<div class="row">


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaltobranch">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0H24V24H0z"/><path d="M21 4L21 6 20 6 14 15 14 22 10 22 10 15 4 6 3 6 3 4z" fill="rgba(255,255,255,1)"/></svg> Fifter To Branch
</button>

&nbsp;&nbsp;&nbsp; 

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exceltobranch">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M3 19h18v2H3v-2zM13 9h7l-8 8-8-8h7V1h2v8z" fill="rgba(255,254,254,1)"/></svg> Export Excel To Branch
</button>

&nbsp;&nbsp;&nbsp; 

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalfrombranch">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0H24V24H0z"/><path d="M21 4L21 6 20 6 14 15 14 22 10 22 10 15 4 6 3 6 3 4z" fill="rgba(255,255,255,1)"/></svg> Fifter From Branch
</button>

&nbsp;&nbsp;&nbsp; 

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#excelfrombranch">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M3 19h18v2H3v-2zM13 9h7l-8 8-8-8h7V1h2v8z" fill="rgba(255,254,254,1)"/></svg> Export Excel From Branch
</button>

</div>
<!--row end-->

<br>

              <table class="table table-bordered table-striped">
  <thead>
    <tr style='background-color:#00ffff'>
      <th scope="col">#</th>
      <th scope="col">Shipment ID</th>
      <th scope="col">Shipment Type</th>
      <th scope="col">Branch</th>
      <th scope="col">Shipping Date</th>
      <th scope="col">Customer/Sender</th>
      <th scope="col">To Branch</th>
      <th scope="col">Payment Method</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Product Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Shipping Cost</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>


 @foreach ($reports as $key=>$item)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$item->shipment_id}}</td>
      <td>{{$item->type}}</td>
      <td>{{$item->branch->name ?? ""}}</td>
      <td>{{$item->date}}</td>
      <td>{{$item->customer->name ?? ""}}</td>
      <td>{{$item->tobranch->name ?? ""}}</td>
      <td>{{$item->pay_method}}</td>
      <td>{{$item->pay_status}}</td>
      <td>{{$item->product_description}}</td>
      <td>{{$item->quantity}}</td>
      <td>{{$item->shipping_cost}}</td>
      <td>{{$item->status}}</td>
    </tr>
@endforeach
  </tbody>
</table>



<!-- Modal Filter to Brach -->
<div class="modal fade" id="exampleModaltobranch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generate Shipment Report of To Branch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<!-- //form -->
      <form action="{{route('shipment.report')}}"  method="GET" style="text-align:center;">

<div class="row" >


    <label for="fromdate" class="form-label"><h5>From</h5></label>
    <input name="fromdate" type="date" class="form-control" id="fromdate" >

<br><br><br>
 
    <label for="todate" class="form-label"><h5>To</h5></label>
    <input name="todate" type="date" class="form-control" id="todate" >

    <br><br><br>
    @if(auth()->user()->role=="admin")

            <label for="exampleFormControlSelect1">Branch</label> 
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
            @foreach ($branches as $branch) 
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
            @endforeach 
            </select>
 
    @endif
    @if(auth()->user()->role=="branch_manager")

            <label for="exampleFormControlSelect1">Branch</label> 
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
           
                    <option value="{{auth()->user()->branch_id}}">{{auth()->user()->branch->name}}</option>
              
            </select>
            
    @endif

    <br><br><br>
    <label for="exampleFormControlSelect1">To Branch</label> 
            <select name="to_branch" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
            @foreach ($branches as $branch) 
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
            @endforeach 
            </select>


            <br><br><br>
    <label for="exampleFormControlSelect1">Shipment Direction</label> 
            <select name="shipment_direction" class="form-control" id="exampleFormControlSelect1">
    
                    <option value="on_delivery">On Delivery</option>
                    <option value="return">Return</option>
     
            </select>
    
   <br><br><br><br>
        <button  type="submit" class="btn btn-success btn-sm">Search</button>
  
</div>
</form>
<!-- //form -->


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Filter to Branch End -->





<!-- Modal Excel to Branch Download -->
<div class="modal fade" id="exceltobranch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Download Shipment Report of To Branch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<!-- //form -->
      <form action="{{route('shipment.report.to.branch.excel.download')}}"  method="GET" style="text-align:center;">

<div class="row" >


    <label for="fromdate" class="form-label"><h5>From</h5></label>
    <input name="fromdate" type="date" class="form-control" id="fromdate" >

<br><br><br>
 
    <label for="todate" class="form-label"><h5>To</h5></label>
    <input name="todate" type="date" class="form-control" id="todate" >

    <br><br><br>
    @if(auth()->user()->role=="admin")

            <label for="exampleFormControlSelect1">Branch</label> 
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
          @foreach ($branches as $branch)  
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
          @endforeach
            </select>
 
    @endif
    @if(auth()->user()->role=="branch_manager")

            <label for="exampleFormControlSelect1">Branch</label> 
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
           
                    <option value="{{auth()->user()->branch_id}}">{{auth()->user()->branch->name}}</option>
              
            </select>
            
    @endif

    <br><br><br>
    <label for="exampleFormControlSelect1">To Branch</label> 
            <select name="to_branch" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
            @foreach ($branches as $branch) 
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
            @endforeach 
            </select>


            <br><br><br>
    <label for="exampleFormControlSelect1">Shipment Direction</label> 
            <select name="shipment_direction" class="form-control" id="exampleFormControlSelect1">
    
                    <option value="on_delivery">On Delivery</option>
                    <option value="return">Return</option>
     
            </select>
    
   <br><br><br><br>
        <button  type="submit" class="btn btn-success btn-sm">Download</button>
  
</div>
</form>
<!-- //form -->


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Excel to Branch Download -->




<!-- Modal Filter from Brach -->
<div class="modal fade" id="exampleModalfrombranch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generate Shipment Report of From Branch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<!-- //form -->
      <form action="{{route('shipment.report.from.branch')}}"  method="GET" style="text-align:center;">

<div class="row" >


    <label for="fromdate" class="form-label"><h5>From</h5></label>
    <input name="fromdate" type="date" class="form-control" id="fromdate" >

<br><br><br>
 
    <label for="todate" class="form-label"><h5>To</h5></label>
    <input name="todate" type="date" class="form-control" id="todate" >

    <br><br><br>
    @if(auth()->user()->role=="admin")

            <label for="exampleFormControlSelect1">Branch</label> 
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
            @foreach ($branches as $branch) 
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
            @endforeach 
            </select>
 
    @endif
    @if(auth()->user()->role=="branch_manager")

            <label for="exampleFormControlSelect1">Branch</label> 
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
           
                    <option value="{{auth()->user()->branch_id}}">{{auth()->user()->branch->name}}</option>
              
            </select>
            
    @endif

    <br><br><br>
    <label for="exampleFormControlSelect1">From Branch</label> 
            <select name="from_branch" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
            @foreach ($branches as $branch) 
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
            @endforeach 
            </select>

            <br><br><br>
    <label for="exampleFormControlSelect1">Shipment Direction</label> 
            <select name="shipment_direction" class="form-control" id="exampleFormControlSelect1">
    
                    <option value="on_delivery">On Delivery</option>
                    <option value="return">Return</option>
     
            </select>
    
   <br><br><br><br>
        <button  type="submit" class="btn btn-success btn-sm">Search</button>
  
</div>
</form>
<!-- //form -->


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Filter from Branch End -->




<!-- Modal Excel from Branch Download -->
<div class="modal fade" id="excelfrombranch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Download Shipment Report of From Branch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<!-- //form -->
      <form action="{{route('shipment.report.from.branch.excel.download')}}"  method="GET" style="text-align:center;">

<div class="row" >


    <label for="fromdate" class="form-label"><h5>From</h5></label>
    <input name="fromdate" type="date" class="form-control" id="fromdate" >

<br><br><br>
 
    <label for="todate" class="form-label"><h5>To</h5></label>
    <input name="todate" type="date" class="form-control" id="todate" >

    <br><br><br>
    @if(auth()->user()->role=="admin")

            <label for="exampleFormControlSelect1">Branch</label> 
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
          @foreach ($branches as $branch)  
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
          @endforeach
            </select>
 
    @endif
    @if(auth()->user()->role=="branch_manager")

            <label for="exampleFormControlSelect1">Branch</label> 
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
           
                    <option value="{{auth()->user()->branch_id}}">{{auth()->user()->branch->name}}</option>
              
            </select>
            
    @endif

    <br><br><br>
    <label for="exampleFormControlSelect1">from Branch</label> 
            <select name="from_branch" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
            @foreach ($branches as $branch) 
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
            @endforeach 
            </select>

            <br><br><br>
    <label for="exampleFormControlSelect1">Shipment Direction</label> 
            <select name="shipment_direction" class="form-control" id="exampleFormControlSelect1">
    
                    <option value="on_delivery">On Delivery</option>
                    <option value="return">Return</option>
     
            </select>
    
   <br><br><br><br>
        <button  type="submit" class="btn btn-success btn-sm">Download</button>
  
</div>
</form>
<!-- //form -->


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Excel from Branch Download -->





</div>

              

        </div>
        
        @endsection