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
                <li class="menu-item has-child">
                  <a href="#" class="menu-link"><span class="menu-icon far fa-file"></span> <span class="menu-text">App Pages</span> <span class="badge badge-warning">New</span></a> <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="page-clients.html" class="menu-link">Clients</a>
                    </li>
                    <li class="menu-item">
                      <a href="page-teams.html" class="menu-link">Teams</a>
                    </li>
                    <li class="menu-item has-child">
                      <a href="#" class="menu-link">Team</a> <!-- grand child menu -->
                      <ul class="menu">
                        <li class="menu-item">
                          <a href="page-team.html" class="menu-link">Overview</a>
                        </li>
                        <li class="menu-item">
                          <a href="page-team-feeds.html" class="menu-link">Feeds</a>
                        </li>
                        <li class="menu-item">
                          <a href="page-team-projects.html" class="menu-link">Projects</a>
                        </li>
                        <li class="menu-item">
                          <a href="page-team-members.html" class="menu-link">Members</a>
                        </li>
                      </ul><!-- /grand child menu -->
                    </li>
                    <li class="menu-item has-child">
                      <a href="#" class="menu-link">Project</a> <!-- grand child menu -->
                      <ul class="menu">
                        <li class="menu-item">
                          <a href="page-project.html" class="menu-link">Overview</a>
                        </li>
                        <li class="menu-item">
                          <a href="page-project-board.html" class="menu-link">Board</a>
                        </li>
                        <li class="menu-item">
                          <a href="page-project-gantt.html" class="menu-link">Gantt View</a>
                        </li>
                      </ul><!-- /grand child menu -->
                    </li>
                    <li class="menu-item">
                      <a href="page-calendar.html" class="menu-link">Calendar</a>
                    </li>
                    <li class="menu-item has-child">
                      <a href="#" class="menu-link">Invoices</a> <!-- grand child menu -->
                      <ul class="menu">
                        <li class="menu-item">
                          <a href="page-invoices.html" class="menu-link">List</a>
                        </li>
                        <li class="menu-item">
                          <a href="page-invoice.html" class="menu-link">Details</a>
                        </li>
                      </ul><!-- /grand child menu -->
                    </li>
                    <li class="menu-item">
                      <a href="page-messages.html" class="menu-link">Messages</a>
                    </li>
                    <li class="menu-item">
                      <a href="page-conversations.html" class="menu-link">Conversations</a>
                    </li>
                  </ul><!-- /child menu -->
                </li><!-- /.menu-item -->
                <!-- .menu-item -->
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
                <li class="menu-item has-child">
                  <a href="#" class="menu-link"><span class="menu-icon oi oi-person"></span> <span class="menu-text">User</span></a> <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="{{route('user.add')}}" class="menu-link">Add User</a>
                    </li>
                    <li class="menu-item">
                      <a href="{{route('user.list')}}" class="menu-link">User List</a>
                    </li>
                    <li class="menu-item">
                      <a href="user-teams.html" class="menu-link">Teams</a>
                    </li>
                    <li class="menu-item">
                      <a href="user-projects.html" class="menu-link">Projects</a>
                    </li>
                    <li class="menu-item">
                      <a href="user-tasks.html" class="menu-link">Tasks</a>
                    </li>
                    <li class="menu-item">
                      <a href="user-profile-settings.html" class="menu-link">Profile Settings</a>
                    </li>
                    <li class="menu-item">
                      <a href="user-account-settings.html" class="menu-link">Account Settings</a>
                    </li>
                    <li class="menu-item">
                      <a href="user-billing-settings.html" class="menu-link">Billing Settings</a>
                    </li>
                    <li class="menu-item">
                      <a href="user-notification-settings.html" class="menu-link">Notification Settings</a>
                    </li>
                  </ul><!-- /child menu -->
                </li><!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item has-child">
                  <a href="#" class="menu-link"><span class="menu-icon oi oi-browser"></span> <span class="menu-text">Layouts</span> <span class="badge badge-subtle badge-success">+4</span></a> <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="layout-blank.html" class="menu-link">Blank Page</a>
                    </li>
                    <li class="menu-item">
                      <a href="layout-nosearch.html" class="menu-link">Header no Search</a>
                    </li>
                    <li class="menu-item">
                      <a href="layout-horizontal-menu.html" class="menu-link">Horizontal Menu</a>
                    </li>
                    <li class="menu-item">
                      <a href="layout-fullwidth.html" class="menu-link">Full Width</a>
                    </li>
                    <li class="menu-item">
                      <a href="layout-pagenavs.html" class="menu-link">Page Navs</a>
                    </li>
                    <li class="menu-item">
                      <a href="layout-pagecover.html" class="menu-link">Page Cover</a>
                    </li>
                    <li class="menu-item">
                      <a href="layout-pagecover-img.html" class="menu-link">Cover Image</a>
                    </li>
                    <li class="menu-item">
                      <a href="layout-pagesidebar.html" class="menu-link">Page Sidebar</a>
                    </li>
                    <li class="menu-item">
                      <a href="layout-pagesidebar-fluid.html" class="menu-link">Sidebar Fluid</a>
                    </li>
                    <li class="menu-item">
                      <a href="layout-pagesidebar-hidden.html" class="menu-link">Sidebar Hidden</a>
                    </li>
                    <li class="menu-item">
                      <a href="layout-custom.html" class="menu-link">Custom</a>
                    </li>
                  </ul><!-- /child menu -->
                </li><!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item">
                  <a href="landing-page.html" class="menu-link"><span class="menu-icon fas fa-rocket"></span> <span class="menu-text">Landing Page</span></a>
                </li><!-- /.menu-item -->
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
                    <li class="menu-item">
                      <a href="component-list-views.html" class="menu-link">List Views</a>
                    </li>
                    <li class="menu-item">
                      <a href="component-sortable-nestable.html" class="menu-link">Sortable & Nestable</a>
                    </li>
                    <li class="menu-item">
                      <a href="component-activity.html" class="menu-link">Activity</a>
                    </li>
                    <li class="menu-item">
                      <a href="component-steps.html" class="menu-link">Steps</a>
                    </li>
                    <li class="menu-item">
                      <a href="component-tasks.html" class="menu-link">Tasks</a>
                    </li>
                    <li class="menu-item">
                      <a href="component-metrics.html" class="menu-link">Metrics</a>
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
                    <li class="menu-item">
                      <a href="form-pickers.html" class="menu-link">Pickers</a>
                    </li>
                    <li class="menu-item">
                      <a href="form-editors.html" class="menu-link">Editors</a>
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
                    <li class="menu-item">
                      <a href="table-responsive-datatables.html" class="menu-link">Responsive Datatables</a>
                    </li>
                    <li class="menu-item">
                      <a href="table-filters-datatables.html" class="menu-link">Filter Columns</a>
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
                    <li class="menu-item">
                      <a href="collection-jqvmap.html" class="menu-link">Vector Map</a>
                    </li>
                  </ul><!-- /child menu -->
                </li><!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item has-child">
                  <a href="#" class="menu-link"><span class="menu-icon oi oi-list-rich"></span> <span class="menu-text">Level Menu</span></a> <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="#" class="menu-link">Menu Item</a>
                    </li>
                    <li class="menu-item has-child">
                      <a href="#" class="menu-link">Menu Item</a> <!-- grand child menu -->
                      <ul class="menu">
                        <li class="menu-item">
                          <a href="#" class="menu-link">Child Item</a>
                        </li>
                        <li class="menu-item">
                          <a href="#" class="menu-link">Child Item</a>
                        </li>
                        <li class="menu-item has-child">
                          <a href="#" class="menu-link">Child Item</a> <!-- grand child menu -->
                          <ul class="menu">
                            <li class="menu-item">
                              <a href="#" class="menu-link">Grand Child Item</a>
                            </li>
                            <li class="menu-item">
                              <a href="#" class="menu-link">Grand Child Item</a>
                            </li>
                            <li class="menu-item">
                              <a href="#" class="menu-link">Grand Child Item</a>
                            </li>
                            <li class="menu-item">
                              <a href="#" class="menu-link">Grand Child Item</a>
                            </li>
                          </ul><!-- /grand child menu -->
                        </li>
                        <li class="menu-item">
                          <a href="#" class="menu-link">Child Item</a>
                        </li>
                      </ul><!-- /grand child menu -->
                    </li>
                    <li class="menu-item">
                      <a href="#" class="menu-link">Menu Item</a>
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