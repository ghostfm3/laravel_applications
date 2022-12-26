$( function() {
    $(document).on("click", '[id^=delete_button]',function ()
    {
        const id = $(this).attr("id").substr(14);
        console.log(id);

        $.ajaxSetup( {
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if ( confirm('本当に削除してもいいですか?')){
            var clickEle = $(this);
            $.ajax({
                type: "post",
                url: `http://localhost:8080/todos/${id}`,
                dataType: 'json',
                data: {"id":id, "_method":"DELETE"}
            })

            .done((res) => 
            {
                if(res["status"] == "success")
                {
                    clickEle.parents('tr').remove();
                    console.log("呼び出し");
                }
            })
            .fail( function(XMLHttpRequest, textStatus, errorThrown)
        {
        
            console.log(XMLHttpRequest.status);
            console.log(textStatus);
            console.log(errorThrown);
        }
        );


        }
    });
})
