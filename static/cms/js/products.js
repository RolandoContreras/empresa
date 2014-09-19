$(document).ready(function(){	
        $('#product-form').validate({
	    rules: {
              id_category: {
	      required: true
	      },	
	      tittle: {
	      minlength: 2,
	      required: true
	      },	
	      description: {
	      minlength: 2,
	      required: true
	      },
              precio: {
	      required: true
	      },
              stock: {
	      required: true
	      },
              position: {
	      minlength: 1,
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

function new_products(){
     var url = 'dashboard/productos/load';
     location.href = site+url;
}
function cancelar_product(){
	var url= 'dashboard/productos';
	location.href = site+url;
}

function edit_menu(menu_id){    
     var url = 'dashboard/menu/load/'+menu_id;
     location.href = site+url;   
}
