function redirect(url, id){
    var value_user = $("#" + id).val();
    $.ajax({
        type: 'POST',
        url: url,
        data: 'data=' + value_user,

        beforeSend: function(){
            $('#gifResultado').show();
            $('#divView').empty();
            $('#gifResultado').html("<img src='../img/gif/ajax-loader.gif'>");
        },

        success: function(response){
            setTimeout(function() {
                $('#divView').empty();
                $('#divView').append(response);
            },900);
        },

        complete: function () {
            $('#gifResultado').hide();
        },
    });
}