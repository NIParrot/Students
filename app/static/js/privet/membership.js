$('#exampleModal').on('show.bs.modal', function(e) {

    var _button = $(e.relatedTarget);

    // console.log(_button, _button.parents("tr"));
    var _row = _button.parents("tr");
    var _chequeAmt = _row.find(".cheque-amt").text();
    var students_id = _row.find(".students_id").text();

    $(this).find(".cheque-amt", "student_id").val(_chequeAmt, students_id);
});