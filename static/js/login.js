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
                 
                 $("#mensaje_upline").html(); 
                 var texto_code = "";
                 texto_code = texto_code+'<input type="hidden" id="upline" name="upline" value="'+data.print2+'"/>';
                 texto_code = texto_code+'<input type="hidden" id="position_2" name="position_2" value="'+data.print3+'"/>';
                 $("#mensaje_upline").html(texto_code); 
            }else{
                $("#mensaje").html();
                 var texto = "";
                 texto = texto+'<div class="alert alert-error">';
                 texto = texto+'<p>'+data.print+'</p>';
                 texto = texto+'</div>';                 
                 $("#mensaje_upline").html(texto);
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
                 texto = texto+'<p>'+data.print+'</p>';
                 texto = texto+'</div>';                 
                 $("#mensaje_username").html(texto); 
            }else{
                $("#mensaje_username").html();
                 var texto = "";
                 texto = texto+'<div class="alert alert-error">';
                 texto = texto+'<p>'+data.print+'</p>';
                 texto = texto+'</div>';                 
                 $("#mensaje_username").html(texto);
            }
        }            
    });
};
function validate_dni(dni) {
        $.ajax({
        type: "post",
        url: site + "register/validate_dni",
        dataType: "json",
        data: {dni: dni},
        success:function(data){            
                if(data.message == "false"){                         
                $("#mensaje_dni").html();
                 var texto = "";
                 texto = texto+'<div class="alert alert-success">';
                 texto = texto+'<p>'+data.print+'</p>';
                 texto = texto+'</div>';                 
                 $("#mensaje_dni").html(texto); 
            }else{
                $("#mensaje_dni").html();
                 var texto = "";
                 texto = texto+'<div class="alert alert-error">';
                 texto = texto+'<p>'+data.print+'</p>';
                 texto = texto+'</div>';                 
                 $("#mensaje_dni").html(texto);
            }
        }            
    });
};