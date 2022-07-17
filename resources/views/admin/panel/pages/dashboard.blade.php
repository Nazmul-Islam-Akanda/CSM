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
           <h1> Dashboard   </h1> 
            
                </div>
              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <!-- .section-block -->
                <div class="section-block">
                  <!-- metric row -->
                  <div class="metric-row">
                    <div class="col-lg-9">
                      <div class="metric-row metric-flush">
                        <!-- metric column -->
                        <div class="col">
                          <!-- .metric -->
                          <a href="user-teams.html" class="metric metric-bordered align-items-center">
                            <h2 class="metric-label"> Total Shipments </h2>
                            <p class="metric-value h3">
                              <sub><i class="oi oi-people"></i></sub> <span class="value">{{$count['shipments']}}</span>
                            </p>
                          </a> <!-- /.metric -->
                        </div><!-- /metric column -->
                        <!-- metric column -->
                        <div class="col">
                          <!-- .metric -->
                          <a href="user-projects.html" class="metric metric-bordered align-items-center">
                            <h2 class="metric-label"> Total Customers </h2>
                            <p class="metric-value h3">
                              <sub><i class="oi oi-fork"></i></sub> <span class="value">{{$count['customers']}}</span>
                            </p>
                          </a> <!-- /.metric -->
                        </div><!-- /metric column -->
                        <!-- metric column -->
                        <div class="col">
                          <!-- .metric -->
                          <a href="user-tasks.html" class="metric metric-bordered align-items-center">
                            <h2 class="metric-label"> Income of this Month </h2>
                            <p class="metric-value h3">
                              <sub><i class="fa fa-tasks"></i></sub> <span class="value">{{$count['income']}}</span>
                            </p>
                          </a> <!-- /.metric -->
                        </div><!-- /metric column -->
                             <!-- metric column -->
                             <div class="col">
                          <!-- .metric -->
                          <a href="user-tasks.html" class="metric metric-bordered align-items-center">
                            <h2 class="metric-label"> Expense of this Month </h2>
                            <p class="metric-value h3">
                              <sub><i class="fa fa-tasks"></i></sub> <span class="value">{{$count['expense']}}</span>
                            </p>
                          </a> <!-- /.metric -->
                        </div><!-- /metric column -->
                      </div>
                    </div><!-- metric column -->
                    <div class="col-lg-3">
                      <!-- .metric -->
                      <a href="user-tasks.html" class="metric metric-bordered">
                        <div class="metric-badge">
                        <h3 style="color:black; background-color:#E4F789"> Profit of this Month </h3>
                        </div>
                        <p class="metric-value h3">
                          <sub><i class="oi oi-timer"></i></sub> <span class="value">{{$count['profit']}}</span>
                        </p>
                      </a> <!-- /.metric -->
                    </div><!-- /metric column -->
                  </div><!-- /metric row -->
                </div><!-- /.section-block -->


              </div><!-- /.page-section -->
            </div><!-- /.page-inner -->
          </div><!-- /.page -->
        </div>



        
        @endsection