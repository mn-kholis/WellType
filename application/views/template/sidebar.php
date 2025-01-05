<!-- /top navigation -->
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="Dashboard_admin" class="site_title"><i class="fa fa-paw"></i> <span>WELL TYPE</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <!-- <img src="<?php echo base_url() ?>template/production/images//img.jpg" alt="..." class="img-circle profile_img"> -->
          </div>
          <div class="profile_info">
            <span>Welcome,</span>
            <h2><?= $this->session->userdata('username');?></h2>
          </div>
        </div>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <ul class="nav side-menu">
              <li><a href= "<?php echo base_url('Dashboard_admin');?>"><i class="fa fa-home"></i> Dashboard</a>
              </li>
              <li><a><i class="fa fa-sitemap"></i> User <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?php echo base_url('user_admin');?>">Admin</a></li>
                  <li><a href="">Premium User</a></li>
                  <li><a href="">Free User</a></li>
                </ul>
              </li>
              <li><a href="<?php echo base_url('content_admin'); ?>"><i class="fa fa-table"></i> Content</a></li>
              </li>
              <li><a><i class="fa fa-laptop"></i> Game</a>
              </li>
              <li><a><i class="fa fa-clone"></i> Notifikasi</a>
              </li>
              <li><a><i class="fa fa-bar-chart-o"></i> Analysis & Reporting</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="right_col" role="main">