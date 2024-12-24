<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WellType</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('template')?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('template')?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('template')?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('template')?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('template')?>/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action ="<?php echo base_url('Auth'); ?>" method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <div>
                <button class="btn btn-secondary submit" href="index.html">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <p>©2024 All Rights Reserved. WellType is a website to learn typing with ten fingers</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <script src=https://unpkg.com/sweetalert/dist/sweetalert.min.js></script>
    <?php if($this->session->flashdata('pesan_sukses')): ?>
    <script>swal("Sukses", "<?php echo $this->session->flashdata('pesan_sukses');?>", "success");</script>
    <?php endif ?>
    <?php if($this->session->flashdata('pesan_gagal')): ?>
    <script>swal("Gagal", "<?php echo $this->session->flashdata('pesan_gagal');?>", "error");</script>
    <?php endif ?>
  </body>
</html>
