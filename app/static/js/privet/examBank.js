$(document).ready(function() {
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('#myTable').on('click', '.btnDelete', function() {
        var confDlt = $(this).closest('tr');
        $('#target3').click(function() {
            $("#exampleModal").modal('hide');
        })
        $("#target2").click(function() {
            confDlt.remove();
            $("#exampleModal").modal('hide');
        });
    });
});