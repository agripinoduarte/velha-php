$(document).ready(function() {
    $('.datepicker').live('focus', function() {
        $(this).datepicker({
            format: 'dd/mm/yyyy',
            language: 'br',
            todayHighlight: true,
            autoclose: true,
        });
    });
});
