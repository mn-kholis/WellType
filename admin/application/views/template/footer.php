<style>
  footer {
    background: #f8f9fa;
    padding: 10px 0;
    text-align: center;
    border-top: 1px solid #e0e0e0;
    position: relative;  /* Agar footer tidak terangkat */
    margin-top: auto;  /* Menjaga footer tetap di bawah */
}
</style> 
    
    
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>template/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="<?php echo base_url() ?>template/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>template/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url() ?>template/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url() ?>template/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="<?php echo base_url() ?>template/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url() ?>template/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url() ?>template/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url() ?>template/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url() ?>template/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url() ?>template/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url() ?>template/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url() ?>template/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url() ?>template/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url() ?>template/vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url() ?>template/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url() ?>template/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

      <!-- footer content -->
      <!-- <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer> -->
    
    
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>template/build/js/custom.min.js"></script>

    <script src=https://unpkg.com/sweetalert/dist/sweetalert.min.js></script>
    <?php if($this->session->flashdata('pesan_sukses')): ?>
    <script>swal("Sukses", "<?php echo $this->session->flashdata('pesan_sukses');?>", "success");</script>
    <?php endif ?>
    <?php if($this->session->flashdata('pesan_gagal')): ?>
    <script>swal("Gagal", "<?php echo $this->session->flashdata('pesan_gagal');?>", "error");</script>
    <?php endif ?>  
