<!-- /top navigation -->
<body class="nav-md">
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="Dashboard_admin" class="site_title"><img src="<?php echo base_url() ?>/assets/image/logo.png" alt="Logo" style="height: 50px; vertical-align: middle; margin-right: 10px;"> <span style="font-weight: bold;">WellType</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <!-- <img src="<?php echo base_url() ?>asset/images/logo.png" alt="logo" class="img-circle profile_img"> -->
          </div>
          <div class="profile_info">
            <span>Welcome,<h2><?= $this->session->userdata('username');?></h2></span>
            <span><?= $this->session->userdata('status_admin');?></span>
          </div>
        </div>
        <!-- /sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <ul class="nav side-menu">
              <li><a href= "<?php echo base_url('Dashboard_admin');?>"><i class="fa fa-home"></i> Dashboard</a>
              </li>
              <li><a><i class="fa fa-sitemap"></i> User <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?php echo site_url('User_admin'); ?>">Admin</a></li>
                  <li><a href="<?php echo site_url('User_premuser'); ?>">Premium User</a></li>
                  <li><a href="<?php echo site_url('User_freeuser'); ?>">Free User</a></li>
                </ul>
              </li>
              <li><a href="<?php echo base_url('Content_admin'); ?>"><i class="fa fa-table"></i> Content</a>
              </li>              
              <li><a  href="<?php echo base_url('Game_admin'); ?>"><i class="fa fa-laptop"></i> Game</a>
              </li>
              <li><a  href="<?php echo base_url('Notifikasi_admin'); ?>"><i class="fa fa-clone"></i> Notifikasi</a>
              </li>
              <li><a href="<?php echo base_url('Analysis_admin'); ?>"><i class="fa fa-bar-chart-o"></i> Analysis & Reporting</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- /sidebar menu -->
      </div>
    </div>
    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
          <ul class=" navbar-right">
            <li class="nav-item dropdown open" style="padding-left: 15px;">
              <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                <?= $this->session->userdata('username');?>
              </a>
              <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"  href="Logout_admin"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="right_col" role="main">



    <!-- sidebar menu -->
    <!-- <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="index.html">Dashboard</a></li>
              <li><a href="index2.html">Dashboard2</a></li>
              <li><a href="index3.html">Dashboard3</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="form.html">General Form</a></li>
              <li><a href="form_advanced.html">Advanced Components</a></li>
              <li><a href="form_validation.html">Form Validation</a></li>
              <li><a href="form_wizards.html">Form Wizard</a></li>
              <li><a href="form_upload.html">Form Upload</a></li>
              <li><a href="form_buttons.html">Form Buttons</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="general_elements.html">General Elements</a></li>
              <li><a href="media_gallery.html">Media Gallery</a></li>
              <li><a href="typography.html">Typography</a></li>
              <li><a href="icons.html">Icons</a></li>
              <li><a href="glyphicons.html">Glyphicons</a></li>
              <li><a href="widgets.html">Widgets</a></li>
              <li><a href="invoice.html">Invoice</a></li>
              <li><a href="inbox.html">Inbox</a></li>
              <li><a href="calendar.html">Calendar</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="tables.html">Tables</a></li>
              <li><a href="tables_dynamic.html">Table Dynamic</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="chartjs.html">Chart JS</a></li>
              <li><a href="chartjs2.html">Chart JS2</a></li>
              <li><a href="morisjs.html">Moris JS</a></li>
              <li><a href="echarts.html">ECharts</a></li>
              <li><a href="other_charts.html">Other Charts</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
              <li><a href="fixed_footer.html">Fixed Footer</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="menu_section">
        <h3>Live On</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="e_commerce.html">E-commerce</a></li>
              <li><a href="projects.html">Projects</a></li>
              <li><a href="project_detail.html">Project Detail</a></li>
              <li><a href="contacts.html">Contacts</a></li>
              <li><a href="profile.html">Profile</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="page_403.html">403 Error</a></li>
              <li><a href="page_404.html">404 Error</a></li>
              <li><a href="page_500.html">500 Error</a></li>
              <li><a href="plain_page.html">Plain Page</a></li>
              <li><a href="login.html">Login Page</a></li>
              <li><a href="pricing_tables.html">Pricing Tables</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="#level1_1">Level One</a>
                <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li class="sub_menu"><a href="level2.html">Level Two</a>
                    </li>
                    <li><a href="#level2_1">Level Two</a>
                    </li>
                    <li><a href="#level2_2">Level Two</a>
                    </li>
                  </ul>
                </li>
                <li><a href="#level1_2">Level One</a>
                </li>
            </ul>
          </li>                  
          <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
        </ul>
      </div>

    </div> -->
            <!-- /sidebar menu -->