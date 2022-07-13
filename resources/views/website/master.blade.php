
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Startbox | Landing</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Startbox">
    <meta name="author" content="RunWebRun">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- Favicon-->
    <link rel="icon" type="image/png" href="assets/img/root/favicon.png"><!-- Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&amp;display=swap"><!-- Style-->
    <!-- build:css -->
    <link rel="stylesheet" href="https://runwebrun.com/startbox/assets/vendors/css/magnific-popup.css">
    <link rel="stylesheet" href="https://runwebrun.com/startbox/assets/vendors/css/swiper-bundle.css">
    <link rel="stylesheet" href="https://runwebrun.com/startbox/assets/css/main.css"><!-- endbuild -->
    <!-- jQuery-->
    <script src="https://runwebrun.com/startbox/assets/vendors/js/jquery.min.js"></script>
</head>

<body>
    <!-- Header-->
    <!-- Navbar top-->
    <nav class="navbar navbar-expand-lg navbar-top  navbar-fixed navbar-opaque">
        <div class="container">
            
        <img src="{{url('/storage/uploads/'.$info->logo)}}" width='40px' alt="Logo">
        <p><b>{{$info->name}}</b></p>

            <ul class="nav navbar-nav order-2 ms-auto nav-no-opacity">
                <li class="nav-item navbar-dropdown"><a class="nav-link" href="{{route('website.home')}}"><span>Home</span></a>
                   
                </li>
        </div>
    </nav>
    














    
    <!-- Main-->
    <div class="content-wrap ">
        <div class="pt-180 pb-290 bg-linear-gradient shape-parent text-center">
            <!-- Shape-->
            <div class="shape justify-content-start"><img loading="lazy" src="https://runwebrun.com/startbox/assets/img/root/landing-shape-958x571.png" alt="" width="958" height="571"></div><!-- Shape-->
            <div class="shape justify-content-end align-items-end"><img loading="lazy" src="https://runwebrun.com/startbox/assets/img/root/landing-shape-487x422.png" alt="" width="487" height="422"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h1 class="mb-30 px-lg-30" data-show="startbox"><span class="highlight">Track Your Shipping</span></h1>


<form action="{{route('shipping.track')}}" method="get" style="display:flex">
  <input style="border:#BBBDBF; border-width:2px; border-style:solid" type="text" class="form-control" name="search" placeholder="Search here..."> 
  <button type="submit" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15zm-3.847-8.699a2 2 0 1 0 2.646 2.646 4 4 0 1 1-2.646-2.646z" fill="rgba(244,247,244,1)"/></svg></button>
</form>

<br><br>




@if($shipment != null)
@if($shipment->status == "Pending"  &&  $shipment->shipment_direction == "on_delivery")
<button class="btn btn-info badge" style="color:black; background-color:green">Pending</button>
<button class="btn btn-info badge" style="color:black; background-color:red">On The Way</button>
<button class="btn btn-info badge" style="color:black; background-color:red">Delivered</button>

<br><br>

<p><b>Shipment in branch {{$shipment->branch->name ?? ""}}</b></p>

@endif
@endif

@if($shipment == "")
<button class="btn btn-info badge" style="color:black; background-color:red">On The Way</button>
@endif



@if($shipment != null)
@if($shipment->status == "On The Way"  &&  $shipment->shipment_direction == "on_delivery")
<button class="btn btn-info badge" style="color:black; background-color:green">Pending</button>
<button class="btn btn-info badge" style="color:black; background-color:green">On The Way</button>
<button class="btn btn-info badge" style="color:black; background-color:red">Delivered</button>

<br><br>

<p><b>Left from branch {{$shipment->branch->name ?? ""}}</b></p>

@endif
@endif

@if($shipment == "")
<button class="btn btn-info badge" style="color:black; background-color:red">On The Way</button>
@endif



@if($shipment != null)
@if($shipment->status == "Delivered" && $shipment->shipment_direction == "on_delivery")
<button class="btn btn-info badge" style="color:black; background-color:green">Pending</button>
<button class="btn btn-info badge" style="color:black; background-color:green">On The Way</button>
<button class="btn btn-info badge" style="color:black; background-color:green">Delivered</button>

<br><br>

<p><b>Received at branch {{$shipment->tobranch->name ?? ""}}</b></p>

@endif
@endif

@if($shipment == "")
<button class="btn btn-info badge" style="color:black; background-color:red">Delivered</button>
@endif



@if($shipment != null)
@if($shipment->shipment_direction == "return")
                        <p class="mb-0 fw-medium font-size-18 px-lg-70" data-show="startbox" data-show-delay="100" style="color:red"><b>Return Shipment</b></p>
@endif
@endif
                    
                    </div>
                </div>
            </div>
        </div>









<!-- Footer-->
    <footer class="bg-dark text-white pt-120 pb-100 footerNext">
        <div class="container">
            <div class="row gy-50">
                <div class="col-12 col-lg-3">


                <img src="{{url('/storage/uploads/'.$info->logo)}}" width='40px' alt="Logo">
        <p><b>{{$info->name}}</b></p>       

                   
                    <p class="font-size-13 text-muted m-0">© 2022 Designed by Brandmyth.</p>
                </div>
                <div class="col-2 d-none d-lg-block"></div>
                <div class="col-12 col-lg-7">
                    <div class="row gy-50">
                        <div class="col-6 col-md-4">
                          
                        </div>
                        <div class="col-6 col-md-4">
                          
                        </div>
                        <div class="col-6 col-md-4">
                            <h6 class="display-6 text-white mb-20">Contact</h6>
                            <ul class="nav flex-column text-white nav-opacity nav-gap-sm">
                           <div style="display:flex"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M9.366 10.682a10.556 10.556 0 0 0 3.952 3.952l.884-1.238a1 1 0 0 1 1.294-.296 11.422 11.422 0 0 0 4.583 1.364 1 1 0 0 1 .921.997v4.462a1 1 0 0 1-.898.995c-.53.055-1.064.082-1.602.082C9.94 21 3 14.06 3 5.5c0-.538.027-1.072.082-1.602A1 1 0 0 1 4.077 3h4.462a1 1 0 0 1 .997.921A11.422 11.422 0 0 0 10.9 8.504a1 1 0 0 1-.296 1.294l-1.238.884zm-2.522-.657l1.9-1.357A13.41 13.41 0 0 1 7.647 5H5.01c-.006.166-.009.333-.009.5C5 12.956 11.044 19 18.5 19c.167 0 .334-.003.5-.01v-2.637a13.41 13.41 0 0 1-3.668-1.097l-1.357 1.9a12.442 12.442 0 0 1-1.588-.75l-.058-.033a12.556 12.556 0 0 1-4.702-4.702l-.033-.058a12.442 12.442 0 0 1-.75-1.588z" fill="rgba(251,246,246,1)"/></svg><li class="nav-item"><a class="nav-link" href="">0{{$info->contact}}</a></li></div> 
                           <div style="display:flex"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm17 4.238l-7.928 7.1L4 7.216V19h16V7.238zM4.511 5l7.55 6.662L19.502 5H4.511z" fill="rgba(246,238,238,1)"/></svg><li class="nav-item"><a class="nav-link" href="">{{$info->email}}</a></li></div> 
                           <div style="display:flex"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M21 20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.49a1 1 0 0 1 .386-.79l8-6.222a1 1 0 0 1 1.228 0l8 6.222a1 1 0 0 1 .386.79V20zm-2-1V9.978l-7-5.444-7 5.444V19h14z" fill="rgba(254,249,249,1)"/></svg><li class="nav-item"><a class="nav-link" href="">{{$info->address}}</a></li></div> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- Vendors-->
    <!-- build:js -->
    <script src="https://runwebrun.com/startbox/assets/vendors/js/bootstrap.js"></script>
    <script src="https://runwebrun.com/startbox/assets/vendors/js/imagesloaded.pkgd.js"></script>
    <script src="https://runwebrun.com/startbox/assets/vendors/js/isotope.pkgd.js"></script>
    <script src="https://runwebrun.com/startbox/assets/vendors/js/jarallax.js"></script>
    <script src="https://runwebrun.com/startbox/assets/vendors/js/jarallax-element.js"></script>
    <script src="https://runwebrun.com/startbox/assets/vendors/js/jquery.countdown.js"></script>
    <script src="https://runwebrun.com/startbox/assets/vendors/js/jquery.magnific-popup.js"></script>
    <script src="https://runwebrun.com/startbox/assets/vendors/js/ofi.js"></script>
    <script src="https://runwebrun.com/startbox/assets/vendors/js/jquery.inview.js"></script>
    <script src="https://runwebrun.com/startbox/assets/vendors/js/swiper-bundle.js"></script>
    <script src="https://runwebrun.com/startbox/assets/vendors/js/gist-embed.min.js"></script>
    <script src="https://runwebrun.com/startbox/assets/js/helpers.js"></script>
    <script src="https://runwebrun.com/startbox/assets/js/controllers/show-on-scroll.js"></script>
    <script src="https://runwebrun.com/startbox/assets/js/controllers/countdown.js"></script>
    <script src="view-source:https://runwebrun.com/startbox/"></script>
    <script src="https://runwebrun.com/startbox/assets/js/controllers/navbar.js"></script>
    <script src="https://runwebrun.com/startbox/assets/js/controllers/stretch-column.js"></script>
    <script src="https://runwebrun.com/startbox/assets/js/controllers/swiper.js"></script>
    <script src="https://runwebrun.com/startbox/assets/js/controllers/others.js"></script><!-- endbuild -->
</body>

</html>