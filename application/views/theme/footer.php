<footer class="main-footer">
  <strong>Copyright &copy; 2020-2024 <a href="#">Nisam IT Solution</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0.1
  </div>
</footer>

</div>
<!-- ./wrapper -->

<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "search": true,
      "lengthMenu": [5, 10, 25, 50, 75, 100, 200, 300, 400, 500],
      "lengthChange": true,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      columnDefs: [{
          targets: [0, 1, 2, 3, 4, 5, 6],
          visible: true
        },
        {
          targets: '_all',
          visible: false
        }
      ]

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "search": true,
      "lengthMenu": [5, 10, 25, 50, 75, 100, 200, 300, 400, 500],
      "lengthChange": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(function() {
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
  });
</script>
</body>

</html>