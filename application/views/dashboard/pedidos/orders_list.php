<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>

<div class="row-fluid">
    <div class="widget_container">
        <div class="well">
            <div class="navbar navbar-static navbar_as_heading">
                <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: auto;">
                                            <a class="brand"> LISTA DE PEDIDO</a>
                                    </div>
                            </div>
                    </div>
            </div>

            <!--- INCIO DE TABLA DE RE4GISTRO -->
            <div class="well" style="width: 97%;"> 
            <table id="table" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>N° DE PEDIDO</th>
                        <th>TICKET</th>
                        <th>CLIENTE</th>
                        <th>TOTAL</th>
                        <th>FECHA PEDIDO</th>
                        <th>FECHA FECHA ENVÍO</th>
                        <th>DIRECCIÓN</th>
                        <th>CIUDAD</th>
                        <th>REFERENCIA</th>
                        <th>ESTADO</th>
                        <th>DETALLE</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php foreach ($obj_order as $value): ?>
                        <tr>
                            <td>
                                <div class="post_title"><?php echo $value->order_id;?></div>
                            </td>
                            <td><?php echo $value->ticket; ?></td>
                            <td><?php echo $value->first_name." ".$value->last_name; ?></td>
                            <td><span class="label label-success"><?php echo format_number($value->total);?></span></td>
                            <td><?php echo $value->date_order;?></td>
                            <td><div class="post_title"><?php echo $value->date_send; ?></div></td>
                            <td><?php echo $value->address; ?></td>
                            <td><?php echo $value->city; ?></td>
                            <td><?php echo $value->references; ?></td>
                            <td>
                                <?php if ($value->status_value == 1) {
                                    $valor = "Pendiente";
                                    $stilo = "label label-important";
                                }else{
                                    $valor = "Enviado";
                                    $stilo = "label label-success";
                                } ?>
                                <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                            </td>
                            <td>
                                <div class="operation">
                                        <div class="btn-group">
                                            <button class="btn btn-small" onclick="change_state('<?php echo $value->order_id;?>');">Enviado</button>
                                            <button class="btn btn-small" onclick="view_details('<?php echo $value->order_id;?>');">Ver</button>
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
</div>
<script type="text/javascript">
   $(document).ready(function() {
    $('#table').dataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
</script>
<script src="static/cms/js/orders.js"></script>