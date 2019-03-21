<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript" charset="utf8"></script>

<!--kebutuhan HTML5 export buttons datatables
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>-->

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            responsive: true,
            //"processing": true,
            //"serverSide": true,
            //"ajax": "config/server_processing.php",
            "language": {
              "url": "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
                "sEmptyTable": "Tidak ada data di database"
            }
            //dom: 'Bfrtip',
        //buttons: [
          //  'copyHtml5',
          //  'excelHtml5',
          //  'csvHtml5',
          //  'pdfHtml5'
        //]
        });
    });
</script>
</body>

</html>