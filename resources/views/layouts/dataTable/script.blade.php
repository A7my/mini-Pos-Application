<!-- jQuery -->
<script src="http://127.0.0.1:8000/backend/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="http://127.0.0.1:8000/backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="http://127.0.0.1:8000/backend/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="http://127.0.0.1:8000/backend/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="http://127.0.0.1:8000/backend/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="http://127.0.0.1:8000/backend/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="http://127.0.0.1:8000/backend/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="http://127.0.0.1:8000/backend/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="http://127.0.0.1:8000/backend/assets/plugins/jszip/jszip.min.js"></script>
<script src="http://127.0.0.1:8000/backend/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="http://127.0.0.1:8000/backend/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="http://127.0.0.1:8000/backend/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="http://127.0.0.1:8000/backend/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="http://127.0.0.1:8000/backend/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="http://127.0.0.1:8000/backend/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://127.0.0.1:8000/backend/assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
