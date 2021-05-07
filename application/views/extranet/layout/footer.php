  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="">KJBP</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script>
  var base_url = "<?php echo base_url();?>";
</script>
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/adminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/adminLTE/dist/js/adminlte.min.js"></script>

<script src="<?php echo base_url()?>js/extranet/home.js"></script>
<?php if( $this->uri->segment(1)=='Tienda'){ ?>  
  <script>
    var search = "<?php echo $search;?>";
  </script>
  <script src="<?php echo base_url()?>js/extranet/tienda.js"></script>
<?php } ?>

</body>
</html>
