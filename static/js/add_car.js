function add_car(product_id){
        bootbox.dialog("¿Desea Agregar el Producto?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Agregar",
            "class" : "btn-success",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"home/add_car/"+product_id,
                   dataType: "json",
                   data: {product_id : product_id},
                   success:function(data){
                        bootbox.dialog("Producto Agregado", []);
                   location.reload();
                   }         
           });
          }
        }
    ]);
}

function empty_car(){
    bootbox.dialog("¿Desea limpiar el carrito?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Limpiar",
            "class" : "btn-danger",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"home/empty_car",
                   dataType: "json",
                   success:function(){
                        bootbox.dialog("Carrito Vacio", []);
                   location.reload();
                   }         
           });
          }
        }
    ]);
}

function update_car(row_id){
    	  $.ajax({
            type: "post",
            url: site+"home/update_car",
            dataType: "json",
            data: {row_id : row_id},
            success:function(dato){  
 		alert("Producto Actulizado")          
                location.reload();
            }         
     }); 
}
function delete_car(row_id){
     bootbox.dialog("Confirma que desea Eliminar el Regístro?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Eliminar",
            "class" : "btn-danger",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"home/delete_car",
                   dataType: "json",
                   data: {row_id : row_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
            }
        }
    ]);
}