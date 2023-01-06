<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">
                            <img src="<?=base_url('assets/images/users/1.jpg')?>" alt="users" class="rounded-circle img-fluid" />
                        </div>
                        <div class="user-content hide-menu m-t-10">
                            <h5 class="m-b-10 user-name font-medium">Steave Jobs</h5>
                            <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="ti-settings"></i>
                            </a>
                            <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?=site_url('home');?>
                            " aria-expanded="false">
                        <i class="sl-icon-home"></i>
                        <span class="hide-menu">Home</span>
                    </a>
                </li>                
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?=site_url('profile');?>
                            " aria-expanded="false">
                        <i class="sl-icon-user-following"></i>
                        <span class="hide-menu">My Profile</span>
                    </a>
                </li>                
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?=site_url('parking');?>
                            " aria-expanded="false">
                        <i class="sl-icon-star"></i>
                        <span class="hide-menu">Parking</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?=site_url('report');?>
                            " aria-expanded="false">
                        <i class="sl-icon-graph"></i>
                        <span class="hide-menu">Report</span>
                    </a>
                </li>                
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)
                            " aria-expanded="false">
                        <i class="mdi mdi-notification-clear-all"></i>
                        <span class="hide-menu">Settings</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="<?=site_url('building');?>" class="sidebar-link">
                                <i class="mdi mdi-octagram"></i>
                                <span class="hide-menu">Building</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?=site_url('payment');?>" class="sidebar-link">
                                <i class="mdi mdi-playlist-check"></i>
                                <span class="hide-menu">Payment</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?=site_url('user');?>" class="sidebar-link">
                                <i class="mdi mdi-playlist-check"></i>
                                <span class="hide-menu">User</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>