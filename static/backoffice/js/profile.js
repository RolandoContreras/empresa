function validate(){ 
    
    first_name = $("#first_name").val();
    
    alert();
    
    username = $("#username").val();
    username = $("#username").val();
    
        n = $("#spinner").get(0);
        t = (new Spinner(opts)).spin(n)
        $.ajax({
           type: "post",
           url: site+"dashboard/productos/delete/"+product_id,
           dataType: "json",
           data: {product_id : product_id},
           success:function(data){    
               t.stop();
//               location.reload();
           }         
       });
    
}
function edit_product(product_id){    
     var url = 'dashboard/productos/load/'+product_id;
     location.href = site+url;   
}
function cancelar_product(){
	var url= 'dashboard/productos';
	location.href = site+url;
}
function delete_product(product_id){
        bootbox.dialog("Confirma que desea Eliminar el Regístro?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Eliminar",
            "class" : "btn-danger",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"dashboard/productos/delete/"+product_id,
                   dataType: "json",
                   data: {product_id : product_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
            }
        }
    ]);
}