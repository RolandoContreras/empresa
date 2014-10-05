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

function send_comment(){
     
     var product_id = $("#product_id").val();
     var name       = $("#name").val();
     var email      = $("#email").val();
     var comment    = $("#comment").val();
     
    var url = 'detail_contain/comments/'+product_id+'/'+name+'/'+email+'/'+comment;
     location.href = site+url;
  //   location.reload();       
}