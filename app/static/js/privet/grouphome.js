$(document).ready(function() {
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "language": {
            search: '<strong class="fa fa-filter mr-2" aria-hidden="true">البحث</strong>',
            searchPlaceholder: 'بحث'
        }
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

    $('#myTable').on('click', '.btnedit', function() {
        var edtMyTd = $(this).closest('tr').eq(0).find('td:first');
        $('#target5').click(function() {
            $("#exampleModal2").modal('hide');
        });
        $('#exampleModal2').on('click', '#target4', function() {
            var str = $(".toedt").val();
            $(edtMyTd).text(str);
            $("#exampleModal2").modal('hide');
            edtMyTd = '';
        });

    });
    $('#exampleModal2').on('show.bs.modal', function(e) {
        var _button = $(e.relatedTarget);
        var _row = _button.parents("tr");
        var _chequeAmt = _row.find(".cheque-amt").text();
        $(this).find(".cheque-amt").val(_chequeAmt);
    });
});