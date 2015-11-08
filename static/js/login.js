/* VALIDACIONES DEL MODULO REGISTRO UPLINE AND NEW USER
     * ======================================================= */
function consul_upline(username) {
        $.ajax({
        type: "post",
        url: site + "register/consulta_upline",
        dataType: "json",
        data: {username: username},
        success:function(data){            
                if(data.message == "true"){                         
                $("#mensaje").html();
                 var texto = "";
                 texto = texto+'<div class="alert alert-success">';
                 texto = texto+'<p>'+data.print+'</p>';
                 texto = texto+'</div>';                 
                 $("#mensaje").html(texto); 
            }else{
                $("#mensaje").html();
                 var texto = "";
                 texto = texto+'<div class="alert alert-error">';
                 texto = texto+'<p>'+data.print+'</p>';
                 texto = texto+'</div>';                 
                 $("#mensaje").html(texto);
            }
        }            
    });
};
function validate_new(username_new) {
        $.ajax({
        type: "post",
        url: site + "register/validate_new",
        dataType: "json",
        data: {username_new: username_new},
        success:function(data){            
                if(data.message == "true"){                         
                $("#mensaje_username").html();
                 var texto = "";
                 texto = texto+'<div class="alert alert-success">';
                 texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                 texto = texto+'<p>'+data.print+'</p>';
                 texto = texto+'</div>';                 
                 $("#mensaje_username").html(texto); 
            }else{
                $("#mensaje_username").html();
                 var texto = "";
                 texto = texto+'<div class="alert alert-error">';
                 texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                 texto = texto+'<p>'+data.print+'</p>';
                 texto = texto+'</div>';                 
                 $("#mensaje_username").html(texto);
            }
        }            
    });
};