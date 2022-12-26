$(function () {
    $("#submit_button").on('click', function (e) {
        console.log("呼び出し");
        $.ajaxSetup( {
          headers: {
            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]').attr( 'content' )
          }
        });

        e.preventDefault();
        const newTodo = $('#text').val();
        const newDeadline = $('#date').val();
     
        
        console.log(newTodo)
        console.log(newDeadline)
        var senddata = {
            "newTodo":newTodo,
            "newDeadline":newDeadline
        }
        $.ajax({
            type: "post",
            url: `http://localhost:8080/todos`,
            dataType: 'json',
            data: senddata
        }).done( ( res ) =>
        {
            console.log("呼び出し")
            if( res["status"] == "success" )
            {
                create_id = res["id"]
                console.log(create_id)
                $('#add_tag').append(`<tr>
                <th scope="row" class="todo">${newTodo}</th>
                <td>${newDeadline}</td>
                <td><a href="http://localhost:8080/todos/${create_id}/edit" class="btn btn-primary">編集</a></td>
                <td>
                   <button name="delete_button" id="delete_button_${create_id}"
                        class="btn btn-danger">削除</button>
                </td>
                </tr>`)

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