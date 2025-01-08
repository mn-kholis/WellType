</div>
</div>
</div>
<!-- footer content -->
<footer>
  <div class="">
    
	Copyright &copy; 2024. Amikom
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->


<!-- jQuery -->
<script src="<?php echo site_url() ?>template/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo site_url() ?>template/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?php echo site_url() ?>template/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo site_url() ?>template/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?php echo site_url() ?>template/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?php echo site_url() ?>template/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo site_url() ?>template/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo site_url() ?>template/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?php echo site_url() ?>template/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?php echo site_url() ?>template/vendors/Flot/jquery.flot.js"></script>
<script src="<?php echo site_url() ?>template/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo site_url() ?>template/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php echo site_url() ?>template/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo site_url() ?>template/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo site_url() ?>template/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo site_url() ?>template/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php echo site_url() ?>template/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?php echo site_url() ?>template/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?php echo site_url() ?>template/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?php echo site_url() ?>template/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo site_url() ?>template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo site_url() ?>template/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo site_url() ?>template/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo site_url() ?>template/build/js/custom.min.js"></script>

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
    
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>template/build/js/custom.min.js"></script>

    <script src=https://unpkg.com/sweetalert/dist/sweetalert.min.js></script>
    <?php if($this->session->flashdata('pesan_sukses')): ?>
    <script>swal("Sukses", "<?php echo $this->session->flashdata('pesan_sukses');?>", "success");</script>
    <?php endif ?>
    <?php if($this->session->flashdata('pesan_gagal')): ?>
    <script>swal("Gagal", "<?php echo $this->session->flashdata('pesan_gagal');?>", "error");</script>
    <?php endif ?>
</body>
</html>

