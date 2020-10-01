$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
    $('#exampleModal').on('show.bs.modal', function (e) {

        var _button = $(e.relatedTarget);
    
        // console.log(_button, _button.parents("tr"));
        var _row = _button.parents("tr");
        var _chequeAmt = _row.find(".cheque-amt").text();
        // console.log(_invoiceAmt, _chequeAmt);
    
        $(this).find(".cheque-amt").val(_chequeAmt);
    });
} );


// setInterval(function(){alert("Hello")},3000);
