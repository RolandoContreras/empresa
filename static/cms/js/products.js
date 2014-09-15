$(document).ready(function(){	
        $('#menu-form').validate({
	    rules: {
              parent_menu_id: {
	      rangelength: [1,2,3],
	      required: true
	      },	
	      tittle: {
	      minlength: 2,
	      required: true
	      },	
	      url: {
	      minlength: 2,
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
     var url = 'dashboard/d_products/load';
     location.href = site+url;
}

function edit_menu(menu_id){    
     var url = 'dashboard/menu/load/'+menu_id;
     location.href = site+url;   
}
function cancelar_menu(){
	var url= 'dashboard/menu';
	location.href = site+url;
}