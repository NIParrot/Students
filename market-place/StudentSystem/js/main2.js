$(document).ready( function () {
    $('#table_id').DataTable();
    $('#table_id').on('click', '.btnDelete', function () {
        $(this).closest('tr').remove();
    });
} );
// setInterval(function(){alert("Hello")},3000);
