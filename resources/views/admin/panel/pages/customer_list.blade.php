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
           <h1>Customer list  </h1> 
                </div>
                <a href="{{ route('customer.add') }}"><button class="btn btn-primary">Create Customer</button></a>
              </header>

              
              <table class="table table-bordered table-striped">
  <thead>
    <tr style='background-color:#00ffff'>
      <th scope="col">#</th>
      <th scope="col">Branch</th>
      <th scope="col">Area</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">NID</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>


 @foreach($customers as $key=>$customer)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$customer->branch->name ?? ""}}</td>
      <td>{{$customer->area->area ?? ""}}</td>
      <td>{{$customer->name}}</td>
      <td>{{$customer->email}}</td>
      <td>{{$customer->n_id}}</td>
      <td>{{$customer->phone}}</td>
      <td>{{$customer->address}}</td>
      <td>
        <a href="{{route('customer.edit',$customer->id)}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-2 2H5v14h14V9.243l2-2V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z" fill="rgba(230,126,34,1)"/></svg></a>
    <a href="{{route('customer.delete',$customer->id)}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" fill="rgba(231,76,60,1)"/></svg></a>
      </td>
    </tr>
@endforeach
  </tbody>
</table>





</div>

              

        </div>
        
        @endsection