<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>

<div class="row-fluid">
    <div class="widget_container">
        <div class="well ">
             <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: auto;">
                                            <a class="brand">COMENTARIOS</a>
                                    </div>
                            </div>
                    </div>

            <!--- INCIO DE TABLA DE RE4GISTRO -->
            <table id="table" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cliente</th>
                        <th>Comentario</th>
                        <th>Fecha de Comentario</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php foreach ($obj_comments as $value): ?>
                        <tr>
                            <td>
                                <div class="post_title"><?php echo $value->tittle;?></div>
                            </td>
                            <td><?php echo $value->name;?></td>
                            <td><?php echo $value->comment;?></td>
                            <td><?php echo formato_fecha($value->date_comment);?></td>
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
                            <td>
                                <div class="operation">
                                        <div class="btn-group">
                                            <?php 
                                            if($value->status_value == 1){ ?>
                                                    <button class="btn btn-small" onclick="change_state_no('<?php echo $value->comment_id;?>');">No Publicar</button>
                                            <?php }else{ ?>
                                                    <button class="btn btn-small" onclick="change_state('<?php echo $value->comment_id;?>');">Publicar</button> 
                                            <?php } ?>
                                            
                                           
                                        </div>
                                    </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

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
<script src="<?php echo site_url();?>static/cms/js/comments.js"></script>