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
        var edtMyTd = $(this).closest('tr').eq(0).find('td').eq(0);
        var edtMyTd2 = $(this).closest('tr').eq(0).find('td').eq(1);
        var edtMyTd3 = $(this).closest('tr').eq(0).find('td').eq(2);
        var edtMyTd4 = $(this).closest('tr').eq(0).find('td').eq(3);
        var edtMyTd5 = $(this).closest('tr').eq(0).find('td').eq(4);
        var edtMyTd6 = $(this).closest('tr').eq(0).find('td').eq(5);
        $('#target5').click(function() {
            $("#exampleModal2").modal('hide');
        });
        $('#exampleModal2').on('click', '#target4', function() {

            var str = $(".toedt").val();
            $(edtMyTd).text(str);

            // var str2 = $(".toedt2").val();
            // $(edtMyTd2).text(str2);

            var str3 = $(".toedt3").val();
            $(edtMyTd3).text(str3);

            var str4 = $(".toedt4").val();
            $(edtMyTd4).text(str4);

            var str5 = $(".toedt5").val();
            $(edtMyTd5).text(str5);

            var str6 = $(".toedt6").val();
            $(edtMyTd6).text(str6);
            $("#exampleModal2").modal('hide');
            edtMyTd = '';
            edtMyTd2 = '';
            edtMyTd3 = '';
            edtMyTd4 = '';
            edtMyTd5 = '';
            edtMyTd6 = '';
        });
    });

    $('#exampleModal2').on('show.bs.modal', function(e) {
        var _button = $(e.relatedTarget);
        var _row = _button.parents("tr");
        var _chequeAmt = _row.find(".cheque-amt").text();
        $(this).find(".cheque-amt").val(_chequeAmt);
    });
    $('#exampleModal2').on('show.bs.modal', function(e) {
        var _button = $(e.relatedTarget);
        var _row = _button.parents("tr");
        var _chequeAmt2 = _row.find(".cheque-amt2").text();
        $(this).find(".cheque-amt2").val(_chequeAmt2);
    });
    $('#exampleModal2').on('show.bs.modal', function(e) {
        var _button = $(e.relatedTarget);
        var _row = _button.parents("tr");
        var _chequeAmt3 = _row.find(".cheque-amt3").text();
        $(this).find(".cheque-amt3").val(_chequeAmt3);
    });
    $('#exampleModal2').on('show.bs.modal', function(e) {
        var _button = $(e.relatedTarget);
        var _row = _button.parents("tr");
        var _chequeAmt4 = _row.find(".cheque-amt4").text();
        $(this).find(".cheque-amt4").val(_chequeAmt4);
    });
    $('#exampleModal2').on('show.bs.modal', function(e) {
        var _button = $(e.relatedTarget);
        var _row = _button.parents("tr");
        var _chequeAmt5 = _row.find(".cheque-amt5").text();
        $(this).find(".cheque-amt5").val(_chequeAmt5);
    });
    $('#exampleModal2').on('show.bs.modal', function(e) {
        var _button = $(e.relatedTarget);
        var _row = _button.parents("tr");
        var _chequeAmt6 = _row.find(".cheque-amt6").text();
        $(this).find(".cheque-amt6").val(_chequeAmt6);
    });
});