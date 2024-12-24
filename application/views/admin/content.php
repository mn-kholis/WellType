<?php $this->load->view('template/header') ?>
<style>
    .table {
        width: 100%;
        table-layout: fixed;
        /* Membuat kolom memiliki lebar tetap */
    }

    .table th,
    .table td {
        padding: 10px;
        text-align: left;
    }

    .table th {
        width: 20%;
        text-align: center;
    }

    .table td {
        width: 20%;
    }
    .table th:nth-child(1), .table td:nth-child(1) {
        width: 5%; 
        text-align: center;  
    }

</style>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>WELL TYPE</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <!-- <img src="<?php echo base_url() ?>template/production/images//img.jpg" alt="..." class="img-circle profile_img"> -->
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>Tia</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <?php $this->load->view('template/sidebar') ?>
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
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    Tia
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;"> Profile</a>
                                    <a class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i>
                                        Log Out</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <!-- <h3>Content</h3> -->
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Content <small>Artikel</small></h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Konten</th>
                                                <th>Konten</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($konten as $row): ?>
                                                <tr>
                                                    <th scope="row"><?php echo $row->id_konten; ?></th>
                                                    <td><?php echo $row->judul_konten; ?></td>
                                                    <td><?php echo substr($row->konten, 0, 100) . '...'; ?></td>
                                                    <td class="text-center">
                                                        <img src="<?php echo base_url('assets/image/' . $row->gambar); ?>"
                                                            width="100" alt="Gambar Konten">
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url('Content_admin/edit/' . $row->id_konten); ?>"
                                                            class="btn btn-warning">Edit</a>
                                                        <a href="<?php echo base_url('Content_admin/delete_content/'. $row->id_konten); ?>"
                                                            class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-left">
                                    <a href="<?php echo base_url('Content_admin/add/'); ?>" class="btn btn-primary">Add Content</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>