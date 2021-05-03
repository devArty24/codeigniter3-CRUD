$(document).ready(function(){
    $(`#frmLogin`).submit(function(ev){
        formData = new FormData(this);
        $(`#alert`).html(``);
        $.ajax({
            type:"POST",
            url:"Login/validate",
            data: formData,
            contentType:false,cache:false,processData:false,
            success:function(response){
                console.log(response);
                json = JSON.parse(response);
                window.location.replace(json[`url`]);
            },
            statusCode:{
                400:function(error){
                    $(`#email > input`).removeClass(`is-invalid`);
                    $(`#password > input`).removeClass(`is-invalid`);
        
                    json = JSON.parse(error[`responseText`]);
                    if(json[`email`].length != 0){
                        $(`#email > div`).html(json[`email`]);
                        $(`#email > input`).addClass(`is-invalid`);
                    }
                    if(json[`password`].length != 0){
                        $(`#password > div`).html(json[`password`]);
                        $(`#password > input`).addClass(`is-invalid`);
                    }
                },
                401:function(error){
                    json = JSON.parse(error[`responseText`]);
                    $(`#alert`).html(`<div class="alert alert-danger" role="alert">${json[`msg`]}</div>`);
                }
            }
        });
        return false;
    });
});