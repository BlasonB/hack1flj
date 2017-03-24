$(document).ready(function() {
    $('#langages').autocomplete({
        serviceUrl: 'comple.php',
        dataType: 'json'
    });
});