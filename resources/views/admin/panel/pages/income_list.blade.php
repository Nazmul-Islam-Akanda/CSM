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
           <h1>Income list  </h1> 
                </div>
                <a href="{{route('transaction.income.add')}}"><button class="btn btn-primary">Add Income</button></a>
              </header>

              
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
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>


@foreach($incomes as $key=>$income)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$income->branch->name ?? ""}}</td>
      <td>{{$income->from_branch->name ?? ""}}</td>
      <td>{{$income->shipment->shipment_id ?? ""}}</td>
      <td>{{$income->customer->name ?? ""}}</td>
      <td>{{$income->income}}</td>
      <td>{{$income->description}}</td>
      <td>
        <a href="{{route('transaction.income.edit',$income->id)}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-2 2H5v14h14V9.243l2-2V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z" fill="rgba(230,126,34,1)"/></svg></a>
    <a href="{{route('transaction.income.delete',$income->id)}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" fill="rgba(231,76,60,1)"/></svg></a>
      </td>
    </tr>
 @endforeach 
  </tbody>
</table>





</div>

              

        </div>
        
        @endsection