$(function () {
    $("#submit_button").on('click', function (e) {
        console.log("呼び出し");
        $.ajaxSetup( {
          headers: {
            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]').attr( 'content' )
          }
        });

        e.preventDefault();
        const username = $('#id').val();
        const messages = $('#msg').val();
     
        
        console.log(username)
        console.log(messages)
        var senddata = {
            "username":username,
            "messages":messages
        }
        $.ajax({
            type: "post",
            url: "http://localhost:8080/add",
            dataType: 'json',
            data: senddata
        }).done( ( res ) =>
        {
            console.log("呼び出し")
            if( res["status"] == "success" )
            {
                created_at = res["created_at"]
                console.log(created_at)
                $('#add_tag').append(`<p><b>[投稿時刻: ${created_at}] ID:${username}</b><br> ${messages} </p>`)
                console.log("成功")
            }

        }).fail( function(XMLHttpRequest, textStatus, errorThrown)
        {
        
            console.log(XMLHttpRequest.status);
            console.log(textStatus);
            console.log(errorThrown);
        }
        );
    });
});