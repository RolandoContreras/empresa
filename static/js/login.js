/* VALIDACIONES Y FUNCIONABILIDAD DEL MODULO LOGIN
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
                 texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                 texto = texto+'<p>'+data.print+'</p>';
                 texto = texto+'</div>';                 
                 $("#mensaje").html(texto); 
            }else{
                $("#mensaje").html();
                 var texto = "";
                 texto = texto+'<div class="alert alert-error">';
                 texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                 texto = texto+'<p>'+data.print+'</p>';
                 texto = texto+'</div>';                 
                 $("#mensaje").html(texto);
            }
        }            
    });
};