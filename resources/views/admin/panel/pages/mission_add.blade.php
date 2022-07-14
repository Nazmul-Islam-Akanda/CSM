
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
           <h1> Create Mission   </h1> 
                </div>

              </header>
          

              <h5>Mission Information</h5>

<!-- error message -->
@if($errors->any())
<div class='alert alert-danger' role="alert">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<!-- error message -->

<form action="{{route('mission.store')}}" method='post'>
    @csrf
<!--fluid-container start-->
<div class="container-fluid">


<!--row start-->
<div class="row">
    <!--column start-->
    <div class="col-md-3">
    <div class="form-group">
            <label for="exampleFormControlSelect1">Branch</label> <i class="text-danger">*</i><br>
            <select name="branch" onchange="getDriver(this.value)" style="width: 200px" id="nameid">
            <option value=""></option>
            @foreach ($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
  
    </select>

    </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Missioning Date</label> <i class="text-danger">*</i>
    <input name="date" type="date" class="form-control" id="" required>
  </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Start Time</label> <i class="text-danger">*</i>
    <input name="time" type="time" class="form-control" id="" required>
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
            <label for="exampleFormControlSelect1">Driver</label> <i class="text-danger">*</i> <a href="{{route('driver.add')}}"><svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M4 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm7 8H7v2h4v4h2v-4h4v-2h-4V7h-2v4z"/></svg>Add</a>
            <select name="driver" onchange="getCustomerData(this.value)" id="driver" style="width: 200px" class="driver">    
  
    </select>

    </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label"> Driver Phone</label> <i class="text-danger">*</i>
    <input type="number" class="form-control" id="phone" >
  </div>
</div>

&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="mb-3">
    <label for="" class="form-label">Driver Address</label> <i class="text-danger">*</i>
    <input  type="text" class="form-control" id="address">
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
    <label for="" class="form-label"> Car No.</label> <i class="text-danger">*</i>
    <input name="car_no" type="text" placeholder="Enter the car number" class="form-control" id="" required>
  </div>
</div>
&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;

<div class="col-md-3">
<div class="form-group">
            <label for="exampleFormControlSelect1">To Branch</label> <i class="text-danger">*</i><br>
            <select name="to_branch" style="width: 200px" id="to_branch">
            <option value=""></option>
            @foreach ($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
  
    </select>

    </div>
</div>
<!--column end-->
</div>
<!--row end-->

<br><br><br>

<h5>Shipment Information</h5>

<div style="margin-top: 20px;">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Shipments ID</th>
                            <th scope="col">
                              <a href="javascript:void(0);" class="add_button btn btn"  title="add field" style="background-color:#53B5D5">Add More</a>
                            </th>
                          </tr>
                        </thead>
                      </table>
                </div>
                
                <div class="row field_wrapper" style="display: flex;">  </div>
          
<br>


</div>

  <button type="submit" class="btn btn-primary">Submit</button>
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

        $(".driver").select2({
            placeholder: "Select a Customer",
            allowClear: true
        });

        $("#to_branch").select2({
            placeholder: "Select a branch",
            allowClear: true
        });

       
</script>
        

        </div>


        <script>
  //Drivers under branch
  function getDriver(branch){
            $("#driver").empty();
            $.ajax({
                url: 'https://csm.test/admin/driver-list/' + branch,
                context: document.body,
                success: function (response){

                    for ( driver of response.data ){
                        console.log(driver.name)
                        $("#driver").append("<option value="+driver.id+" ?? '' >"+driver.name+"</option>")
                    }
                   
                }
            });

        }


 //driver phone and address under customer
 function getCustomerData(driver){
            $("#phone").empty();
            $("#address").empty();
            $.ajax({
                url: 'https://csm.test/admin/driver-phone-address/' + driver,
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

        
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      var max_field = 100; //Input fields increment limitation
      var add_button = $('.add_button'); //Add button selector
      var field_wrapper = $('.field_wrapper'); //Input field wrapper
      var html_field = '<div class="delete ">  <input name="shipment_id[]" type="string" class="form-control" id="" >   <br>   <a href="javascript:void(0);" class="remove_button btn btn-danger">Remove</a></div> &nbsp;&nbsp; '; 
      var x = 1; 
      
       //Once add button is clicked
      $(add_button).click(function(){
        //Check maximum number of input fields
          if(x < max_field){ 
              x++;//Increment field counter
              $(field_wrapper).append(html_field); //Add field html
          }
      });
      
         //Once remove button is clicked
      $(field_wrapper).on('click', '.remove_button', function(e){
          e.preventDefault();
          $(this).closest('.delete').remove(); //Remove field html
          x--; //Decrement field counter
      });

    
  });
  </script>
        
        @endsection
