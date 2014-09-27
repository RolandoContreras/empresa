function add_car(product_id){
    	  $.ajax({
            type: "post",
            url: site+"home/add_car/"+product_id,
            dataType: "json",
            data: {product_id : product_id},
            success:function(dato){  
 		alert("El Producto se ha agregado")          
                location.reload();
            }         
     }); 
}

function empty_car(){
    	  $.ajax({
            type: "post",
            url: site+"home/empty_car",
            dataType: "json",
            success:function(dato){  
 		alert("Carrito Vacio")          
                location.reload();
            }         
     }); 
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
    	  $.ajax({
            type: "post",
            url: site+"home/delete_car",
            dataType: "json",
            data: {row_id : row_id},
            success:function(dato){  
 		alert("Producto Eliminado")          
                location.reload();
            }         
     }); 
}