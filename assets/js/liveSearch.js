$(search());

function search(query) {
    $.ajax({
        url: './../controllers/searchUser.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: query},
    })
    .done(function(response) {
        $("#searchBox").html(response);
    })
    .fail(function() {
        console.log("ERROR");
    })
}

$(document).on('keyup', '#search', function() {
    var valor = $(this).val();

    if (valor != "") {
        search(valor);
    }else{
        search();
    }
});