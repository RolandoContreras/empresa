<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>
<div class="row-fluid">
    <div class="widget_container">
        <div class="well nomargin">
            <div class="navbar navbar-static navbar_as_heading">
                <div class="navbar-inner">
                    <div class="container" style="width: auto;">
                        <a class="brand"> LISTADO DE PRODUCTOS</a>
                        <a class="btn pull-right" onclick="new_products();" >Agregar</a>
                    </div>
                </div>
            </div>
            <!--- INCIO DE TABLA DE RE4GISTRO -->
            <div class="well" style="width: 97%;"> 
            <table id="table" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Categoria</th>
                        <th>Marca</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Posicion</th>
                        <th>Imagen Principal</th>
                        <th>Imagen1 </th>
                        <th>Imagen2</th>
                        <th>Imagen3</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php foreach ($obj_products as $value): ?>
                        <tr>
                            <td><?php echo $value->code;?></td>
                            <td>
                                <div class="post_title"><?php echo $value->tittle;?>
                                    <div class="operation">
                                        <div class="btn-group">
                                            <button class="btn btn-small" onclick="edit_product('<?php echo $value->product_id;?>');"><i class="icon-pencil"></i> Editar</button>
                                            <button class="btn btn-small" onclick="delete_product('<?php echo $value->product_id;?>');"><i class="icon-trash-1"></i>Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $value->description; ?></td>
                            <td><?php echo $value->name;?></td>
                            <td><div class="post_title"><?php echo $value->brand;?></div></td>
                            <td><?php echo $value->price;?></td>
                            <td><?php echo $value->stock;?></td>
                            <td><?php echo $value->position; ?></td>
                            <td><img src="<?php echo SERVER2.$value->custom_image?>" height="42" width="42"></td>
                            <td><img src="<?php echo SERVER2.$value->big_image?>" height="42" width="42"></td>
                            <td><img src="<?php echo SERVER2.$value->medium_image?>" height="42" width="42"></td>
                            <td><img src="<?php echo SERVER2.$value->small_image?>" height="42" width="42"></td>
                            <td>
                                <?php if ($value->status_value == 1) {
                                    $valor = "Activo";
                                    $stilo = "label label-success";
                                }else{
                                    $valor = "Inactivo";
                                    $stilo = "label label-important";
                                } ?>
                                <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>        
            <!--- FIN DE TABLA DE RE4GISTRO -->
        </div>
    </div>
</div>
<script type="text/javascript">
   $(document).ready(function() {
    $('#table').dataTable( {
        columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        }, {
            targets: [ 4 ],
            orderData: [ 4, 0 ]
        } ]
    } );
} );
</script>
<script type="text/javascript">
function new_products(){
     var url = 'dashboard/productos/load';
     location.href = site+url;
}
function edit_product(product_id){    
     var url = 'dashboard/productos/load/'+product_id;
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
</script>


