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
           <h1>Income Report  </h1> 
                </div>
               
              </header>



<!--row start-->
<div class="row">


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0H24V24H0z"/><path d="M21 4L21 6 20 6 14 15 14 22 10 22 10 15 4 6 3 6 3 4z" fill="rgba(255,255,255,1)"/></svg> Fifter
</button>

&nbsp;&nbsp;&nbsp; 

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#excel">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M3 19h18v2H3v-2zM13 9h7l-8 8-8-8h7V1h2v8z" fill="rgba(255,254,254,1)"/></svg> Export Excel
</button>


</div>
<!--row end-->

<br>
@if($reports)
<p><b>Total income is {{$reports->sum('income') ?? ""}}</b></p>  
@endif
              <table class="table table-bordered table-striped">
  <thead>
    <tr style='background-color:#00ffff'>
      <th scope="col">#</th>
      <th scope="col">Beneficiary Branch</th>
      <th scope="col">From Branch</th>
      <th scope="col">Shipment ID</th>
      <th scope="col">From Customer</th>
      <th scope="col">Income</th>
      <th scope="col">Description</th>
      <th scope="col">Creation Time</th>
    </tr>
  </thead>
  <tbody>


  @foreach ($reports as $key=>$item)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$item->branch->name ?? ""}}</td>
      <td>{{$item->from_branch->name ?? ""}}</td>
      <td>{{$item->shipment->shipment_id ?? ""}}</td>
      <td>{{$item->customer->name ?? ""}}</td>
      <td>{{$item->income}}</td>
      <td>{{$item->description}}</td>
      <td>{{$item->created_at}}</td>
    </tr>
    @endforeach 
  </tbody>
</table>



<!-- Modal Filter -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generate Income Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<!-- //form -->
      <form action="{{route('transaction.income.report')}}"  method="GET" style="text-align:center;">

<div class="row" >


    <label for="fromdate" class="form-label"><h5>From</h5></label>
    <input name="fromdate" type="date" class="form-control" id="fromdate" >

<br><br><br>
 
    <label for="todate" class="form-label"><h5>To</h5></label>
    <input name="todate" type="date" class="form-control" id="todate" >

    <br><br><br>
    @if(auth()->user()->role=="admin")

            <label for="exampleFormControlSelect1">Beneficiary Branch</label> 
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
            @foreach ($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
            </select>
 
    @endif
    @if(auth()->user()->role=="branch_manager")

            <label for="exampleFormControlSelect1">Beneficiary Branch</label> 
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
           
                    <option value="{{auth()->user()->branch_id}}">{{auth()->user()->branch->name}}</option>
              
            </select>
            
    @endif

    
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
<!-- Modal Filter End -->





<!-- Modal Excel Download -->
<div class="modal fade" id="excel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Download Income Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<!-- //form -->
      <form action="{{route('transaction.income.report.excel.download')}}"  method="GET" style="text-align:center;">

<div class="row" >


    <label for="fromdate" class="form-label"><h5>From</h5></label>
    <input name="fromdate" type="date" class="form-control" id="fromdate" >

<br><br><br>
 
    <label for="todate" class="form-label"><h5>To</h5></label>
    <input name="todate" type="date" class="form-control" id="todate" >

    <br><br><br>
    @if(auth()->user()->role=="admin")

            <label for="exampleFormControlSelect1">Beneficiary Branch</label> 
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
            @foreach ($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
            </select>
 
    @endif
    @if(auth()->user()->role=="branch_manager")

            <label for="exampleFormControlSelect1">Beneficiary Branch</label> 
            <select name="branch" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select branch</option>
           
                    <option value="{{auth()->user()->branch_id}}">{{auth()->user()->branch->name}}</option>
              
            </select>
            
    @endif

    
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
<!-- Modal Excel Download -->







</div>

              

        </div>
        
        @endsection