      <!-- .app-aside -->
      <aside class="app-aside app-aside-expand-md app-aside-light">
        <!-- .aside-content -->
        <div class="aside-content">
          <!-- .aside-header -->
          <header class="aside-header d-block d-md-none">
            <!-- .btn-account -->
            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img src="assets/images/avatars/profile.jpg" alt=""></span> <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span class="account-summary"><span class="account-name">Beni Arisandi</span> <span class="account-description">Marketing Manager</span></span></button> <!-- /.btn-account -->
            <!-- .dropdown-aside -->
            <div id="dropdown-aside" class="dropdown-aside collapse">
              <!-- dropdown-items -->
              <div class="pb-3">
                <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="auth-signin-v1.html"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
              </div><!-- /dropdown-items -->
            </div><!-- /.dropdown-aside -->
          </header><!-- /.aside-header -->
          <!-- .aside-menu -->
          <div class="aside-menu overflow-hidden">
            <!-- .stacked-menu -->
            <nav id="stacked-menu" class="stacked-menu">
              <!-- .menu -->
              <ul class="menu">
                <!-- .menu-item -->
                <li class="menu-item has-active">
                  <a href="{{route('admin.dashboard')}}" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
                </li><!-- /.menu-item -->


                <!-- .menu-item -->
                @if(auth()->user()->role=="admin")
                <li class="menu-item">
                  <a href="{{route('website.setup.info')}}" class="menu-link"><span class="menu-icon fas fa-rocket"></span> <span class="menu-text">Website Setup</span></a>
                </li>
                @endif
              

                <li class="menu-item has-child">
                  <a href="#" class="menu-link"><span class="menu-icon oi oi-wrench"></span> <span class="menu-text">Branch</span></a> <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="{{Route('branch.add')}}" class="menu-link">Add Branch</a>
                    </li>
                    <li class="menu-item">
                      <a href="{{Route('branch.list')}}" class="menu-link">Bracnh List</a>
                    </li>
                  </ul><!-- /child menu -->
                </li><!-- /.menu-item -->


                </li><!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item has-child">
                  <a href="#" class="menu-link"><span class="menu-icon oi oi-wrench"></span> <span class="menu-text">Area</span></a> <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="{{Route('area.add')}}" class="menu-link">Add Area</a>
                    </li>
                    <li class="menu-item">
                      <a href="{{Route('area.list')}}" class="menu-link">Area List</a>
                    </li>
                  </ul><!-- /child menu -->
                </li><!-- /.menu-item -->



                <!-- .menu-item -->
                @if(auth()->user()->role=="admin")
                <li class="menu-item has-child">
                  <a href="#" class="menu-link"><span class="menu-icon oi oi-person"></span> <span class="menu-text">User</span></a> <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="{{route('user.add')}}" class="menu-link">Add User</a>
                    </li>
                    <li class="menu-item">
                      <a href="{{route('user.list')}}" class="menu-link">User List</a>
                    </li>
                  </ul><!-- /child menu -->
                </li> 
                @endif<!-- /.menu-item -->
             




                
                <!-- .menu-header -->
                <li class="menu-header">Interactions </li><!-- /.menu-header -->
                <!-- .menu-item -->
                <li class="menu-item has-child">
                  <a href="#" class="menu-link"><span class="menu-icon oi oi-puzzle-piece"></span> <span class="menu-text">Shipments</span></a> <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="{{route('shipment.add')}}" class="menu-link">Add Shipment</a>
                    </li>
                    <li class="menu-item">
                      <a href="{{route('shipment.list')}}" class="menu-link">Shipment List</a>
                    </li>
                    <li class="menu-item">
                      <a href="{{route('shipment.list.return')}}" class="menu-link">Return Shipment List</a>
                    </li>
                  </ul><!-- /child menu -->
                </li><!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item has-child">
                  <a href="#" class="menu-link"><span class="menu-icon oi oi-pencil"></span> <span class="menu-text">Customers</span></a> <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="{{route('customer.add')}}" class="menu-link">Add Customer</a>
                    </li>
                    <li class="menu-item">
                      <a href="{{route('customer.list')}}" class="menu-link">Customer List</a>
                    </li>
                  </ul><!-- /child menu -->
                </li><!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item has-child">
                  <a href="#" class="menu-link"><span class="menu-icon fas fa-table"></span> <span class="menu-text">Drivers</span></a> <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="{{route('driver.add')}}" class="menu-link">Add Driver</a>
                    </li>
                    <li class="menu-item">
                      <a href="{{route('driver.list')}}" class="menu-link">Driver List</a>
                    </li>
                  </ul><!-- /child menu -->
                </li><!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item has-child">
                  <a href="#" class="menu-link"><span class="menu-icon oi oi-bar-chart"></span> <span class="menu-text">Missions</span></a> <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="{{route('mission.add')}}" class="menu-link">Add Mission</a>
                    </li>
                    <li class="menu-item">
                      <a href="{{route('mission.list')}}" class="menu-link">Mission List</a>
                    </li>
                  </ul><!-- /child menu -->
                </li><!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item has-child">
                  <a href="#" class="menu-link"><span class="menu-icon oi oi-list-rich"></span> <span class="menu-text">Transactions</span></a> <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="{{route('transaction.income.list')}}" class="menu-link">Income</a>
                    </li>
                    <li class="menu-item">
                      <a href="{{route('transaction.expense.list')}}" class="menu-link">Expense</a>
                    </li>
                  </ul><!-- /child menu -->
                </li><!-- /.menu-item -->

                  <!-- .menu-item -->
                  <li class="menu-item has-child">
                  <a href="#" class="menu-link"><span class="menu-icon oi oi-list-rich"></span> <span class="menu-text">Reports</span></a> <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="{{route('transaction.income.report')}}" class="menu-link">Income Transactions</a>
                    </li>
                    <li class="menu-item">
                      <a href="{{route('transaction.expense.report')}}" class="menu-link">Expense Transactions</a>
                    </li>
                    <li class="menu-item">
                      <a href="{{route('shipment.report')}}" class="menu-link">Shipments</a>
                    </li>
                  </ul><!-- /child menu -->
                </li><!-- /.menu-item -->

              </ul><!-- /.menu -->
            </nav><!-- /.stacked-menu -->
          </div><!-- /.aside-menu -->
          <!-- Skin changer -->
          <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
          </footer><!-- /Skin changer -->
        </div><!-- /.aside-content -->
      </aside><!-- /.app-aside -->