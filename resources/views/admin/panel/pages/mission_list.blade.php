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
           <h1>Mission list  </h1> 
                </div>
             
              </header>


                            <!--row start-->
<div class="row">
    <!--column start-->
<div class="col-md-3">
<a href="{{ route('mission.add') }}"><button class="btn btn-primary">Create Mission</button></a>
</div>

<div class="col-md-3">
<form action="{{route('mission.list')}}" method="get" style="display:flex">
  <input style="border:#BBBDBF; border-width:2px; border-style:solid" type="text" class="form-control" name="search" placeholder="Search here...">
<button type="submit" class=""><svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M16 2l5 5v14.008a.993.993 0 0 1-.993.992H3.993A1 1 0 0 1 3 21.008V2.992C3 2.444 3.445 2 3.993 2H16zm-2.471 12.446l2.21 2.21 1.415-1.413-2.21-2.21a4.002 4.002 0 0 0-6.276-4.861 4 4 0 0 0 4.861 6.274zm-.618-2.032a2 2 0 1 1-2.828-2.828 2 2 0 0 1 2.828 2.828z" fill="rgba(178,90,12,1)"/></svg></button>
</form>
</div>
<!--column end-->
</div>
<!--row end-->

@if($key)
<h3>You are searching for {{$key}}--Found {{$missions->count()}} result </h3>
@endif

              
              <table class="table table-bordered table-striped">
  <thead>
    <tr style='background-color:#00ffff'>
      <th scope="col">#</th>
      <th scope="col">Branch</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Driver</th>
      <th scope="col">Driver Phone</th>
      <th scope="col">Car No</th>
      <th scope="col">Toward Branch</th>
      <th scope="col">Shipment IDs</th>
      <th scope="col">Status</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>


 @foreach($missions as $key=>$mission)
 @if(auth()->user()->branch_id==$mission->branch_id || auth()->user()->branch_id==$mission->to_branch_id || auth()->user()->role=="admin")
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$mission->branch->name ?? ""}}</td>
      <td>{{$mission->date}}</td>
      <td>{{$mission->time}}</td>
      <td>{{$mission->driver->name ?? ""}}</td>
      <td>{{$mission->driver->phone ?? ""}}</td>
      <td>{{$mission->car_no}}</td>
      <td>{{$mission->to_branch->name ?? ""}}</td>
      <td>
      @foreach ($mission->mission_details as $mission_detail)
            {{ $mission_detail->shipping_id }},
      @endforeach
      </td>
      <td>{{$mission->status}}</td>
      <td>
        <a href="{{route('mission.close',$mission->id)}}"><svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-11.414L9.172 7.757 7.757 9.172 10.586 12l-2.829 2.828 1.415 1.415L12 13.414l2.828 2.829 1.415-1.415L13.414 12l2.829-2.828-1.415-1.415L12 10.586z" fill="rgba(210,118,43,1)"/></svg></a>
    <a href="{{route('mission.delete',$mission->id)}}"><svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" fill="rgba(231,76,60,1)"/></svg></a>
      </td>
    </tr>
    @endif
@endforeach
  </tbody>
</table>
{{$missions->links('pagination::bootstrap-5')}}




</div>

              

        </div>
        
        @endsection