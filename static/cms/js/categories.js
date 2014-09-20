$(document).ready(function(){	
        $('#product-form').validate({
	    rules: {
              name: {
	      minlength: 2,
	      required: true
	      },	
	      observation: {
	      minlength: 2,
	      required: true
	      },
          status_value:{
          required: true,
          rangelength: [1,2]
          }
	    },
	    highlight: function(label) {
	    	$(label).closest('.control-group').addClass('error');
	    },
	    success: function(label) {
	    	label
	    		.text('OK!').addClass('valid')
	    		.closest('.control-group').addClass('success');
	    }
	  });     
	  
}); // end document.ready

function new_categories(){
     var url = 'dashboard/categorias/load';
     location.href = site+url;
}
function edit_product(product_id){    
     var url = 'dashboard/productos/load/'+product_id;
     location.href = site+url;   
}
function cancelar_categories(){
	var url= 'dashboard/categorias';
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