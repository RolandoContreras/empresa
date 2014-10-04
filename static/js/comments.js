$(document).ready(function(){	
        $('#commentform').validate({
	    rules: {
              name: {
	      minlength: 2,
	      required: true
	      },	
	      email: {
	      email : true,
	      required: true
	      },
              comment: {
	      minlength: 1,
	      required: true
	      },
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

function new_products(){
     var url = 'dashboard/productos/load';
     location.href = site+url;
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