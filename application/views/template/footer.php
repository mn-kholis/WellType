</div>
</div>
</div>
</div>
<!-- footer content -->
<footer>
  <div class="pull-right">
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
<!-- Datatables -->
<script src="<?php echo site_url() ?>template/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo site_url() ?>template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo site_url() ?>template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo site_url() ?>template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo site_url() ?>template/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo site_url() ?>template/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo site_url() ?>template/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo site_url() ?>template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo site_url() ?>template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo site_url() ?>template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo site_url() ?>template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo site_url() ?>template/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?php echo site_url() ?>template/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo site_url() ?>template/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo site_url() ?>template/vendors/pdfmake/build/vfs_fonts.js"></script>
<!-- jQuery custom content scroller -->
<script src="<?php echo site_url() ?>template/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo site_url() ?>template/build/js/custom.min.js"></script>

    <script src=https://unpkg.com/sweetalert/dist/sweetalert.min.js></script>
    <?php if($this->session->flashdata('pesan_sukses')): ?>
    <script>swal("Sukses", "<?php echo $this->session->flashdata('pesan_sukses');?>", "success");</script>
    <?php endif ?>
    <?php if($this->session->flashdata('pesan_gagal')): ?>
    <script>swal("Gagal", "<?php echo $this->session->flashdata('pesan_gagal');?>", "error");</script>
    <?php endif ?>
</body>
</html>

