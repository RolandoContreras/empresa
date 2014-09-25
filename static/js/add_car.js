function new_categories(){
     var url = 'dashboard/categorias/load';
     location.href = site+url;
}
function edit_categories(id_category){    
     var url = 'dashboard/categorias/load/'+id_category;
     location.href = site+url;   
}
function cancelar_categories(){
	var url= 'dashboard/categorias';
	location.href = site+url;
}
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
    	var url= 'home/empty_car';
	location.href = site+url;
}