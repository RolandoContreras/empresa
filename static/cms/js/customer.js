function active(customer_id){
     bootbox.dialog("Confirma que desea activar al cliente?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"dashboard/clientes/active_customer",
                   dataType: "json",
                   data: {customer_id : customer_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
            }
        }
    ]);
}
function no_active(customer_id){
     bootbox.dialog("Confirma que desea desactivar al cliente?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"dashboard/clientes/no_active_customer",
                   dataType: "json",
                   data: {customer_id : customer_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
            }
        }
    ]);
}
