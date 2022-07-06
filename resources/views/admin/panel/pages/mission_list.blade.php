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
                <a href="{{ route('mission.add') }}"><button class="btn btn-primary">Create Mission</button></a>
              </header>

              
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
        <a href="{{route('mission.close',$mission->id)}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-11.414L9.172 7.757 7.757 9.172 10.586 12l-2.829 2.828 1.415 1.415L12 13.414l2.828 2.829 1.415-1.415L13.414 12l2.829-2.828-1.415-1.415L12 10.586z" fill="rgba(210,118,43,1)"/></svg></a>
    <a href="{{route('mission.delete',$mission->id)}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" fill="rgba(231,76,60,1)"/></svg></a>
      </td>
    </tr>
@endforeach
  </tbody>
</table>





</div>

              

        </div>
        
        @endsection