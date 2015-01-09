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
                        <a class="brand">Listado de Categorias</a>
                        <a class="btn pull-right" onclick="new_categories();" >Agregar</a>
                    </div>
                </div>
            </div>
            <!---INICIO DE TABLA-->
            <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>OBSERVACION</th>
                                <th>ESTADO</th>
                                <th>OPERACION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($obj_categories as $value): ?>
                                <td>
                                    <div class="post_title"><?php echo $value->name;?></div>
                                </td>
                                <td><?php echo $value->observation; ?></td>
                                <td>
                                    <?php if ($value->status_value == 0) {
                                        $valor = "Inactivo";
                                        $stilo = "label label-important";
                                    }else{
                                        $valor = "Activo";
                                        $stilo = "label label-success";
                                    } ?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                </td>
                                <td>
                                    <div class="operation">
                                        <div class="btn-group">
                                            <button class="btn btn-small" onclick="edit_categories('<?php echo $value->id_category;?>');"><i class="icon-pencil"></i> Editar</button>
                                            <button class="btn btn-small" onclick="delete_categories('<?php echo $value->id_category;?>');"><i class="icon-trash-1"></i>Eliminar</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            
     
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
            targets: [ 3 ],
            orderData: [ 3, 0 ]
        } ]
    } );
} );
</script>
<script src="static/cms/js/categories.js"></script>