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
function edit_categories(id_category){    
     var url = 'dashboard/categorias/load/'+id_category;
     location.href = site+url;   
}
function cancelar_categories(){
	var url= 'dashboard/categorias';
	location.href = site+url;
}
function delete_categories(id_category){
	  $.ajax({
            type: "post",
            url: site+"dashboard/categorias/delete/"+id_category,
            dataType: "json",
            data: {id_category : id_category},
            success:function(data){  
		alert("La Categoria ha sido eliminado")          
          	location.reload();
            }         
     }); 
}