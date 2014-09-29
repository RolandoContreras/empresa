function view_details(order_id){
     var url = 'dashboard/pedidos/ver_detalle/'+order_id;
     location.href = site+url;
}
function edit_product(product_id){    
     var url = 'dashboard/productos/load/'+product_id;
     location.href = site+url;   
}
function order_send(){
	var url= 'dashboard/productos';
	location.href = site+url;
}
function delete_product(product_id){
	  $.ajax({
            type: "post",
            url: site+"dashboard/productos/delete/"+product_id,
            dataType: "json",
            data: {product_id : product_id},
            success:function(data){  
			alert("El producto ha sido eliminado")          
          	location.reload();
            }         
     }); 
}