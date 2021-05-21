
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="">KJBP</a>.</strong> All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<script>
  var base_url = "<?php echo base_url();?>";
</script>
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/adminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<!-- scroll dentro de div  -->
<script src="<?php echo base_url();?>assets/adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>assets/adminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/adminLTE/plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/adminLTE/dist/js/adminlte.js"></script>

<?php if( $this->uri->segment(1)=='cTienda'){ ?>  
  <script src="<?php echo base_url()?>js/intranet/tienda.js"></script>
<?php } ?>

<?php if( $this->uri->segment(1)=='cProducto'){ ?>
  <script>
    var tienda_id = "<?php echo $tienda_id;?>";
  </script>
  <script src="<?php echo base_url()?>js/intranet/producto.js"></script>
<?php } ?>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>

</body>
</html>
