function send_email(){
     name = $("#name").val();
     email = $("#email").val();    
     asunto = $("#asunto").val();
     message = $("#message").val();
     
    $.ajax({
        type: "post",
        url: "contacto/send_email",
        dataType: "json",
        data: {email : email,
               name:name, 
               asunto:asunto, 
               message:message},
        success:function(data){            
            bootbox.dialog("El Mensaje ha sido enviado", []);
            location.reload();
        }            
    });
}