function validate(){
    username = $("#username").val();
    password = $("#password").val();  
    username = $("#username").val();
    password = $("#password").val();  
    username = $("#username").val();
    password = $("#password").val();  
    username = $("#username").val();
    password = $("#password").val();  
    username = $("#username").val();
    password = $("#password").val();  
    
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
function delete_car(row_id){
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

function empty_car(){
        $.ajax({
                   type: "post",
                   url: site+"home/empty_car",
                   dataType: "json",
                   success:function(){
                   location.reload();
                   }         
           });
         
}