<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>

<!-- main content -->
<div id="main_content" class="span9">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                    <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: auto;">
                                            <a class="brand">ACTIVACIÓN ASOCIADOS</a>
                                    </div>
                            </div>
                    </div>
                
             <form id="product-form" name="product-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/reportes_comision";?>">
                <div class="well nomargin" style="width: 1050px;">
                    <!--- INCIO DE TABLA DE RE4GISTRO -->
                   <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>N° PEDIDO</th>
                                <th>ASOCIADO</th>
                                <th>CÓDIGO</th>
                                <th>ESTADO</th>
                                <th>OPERACION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($obj_customer as $value): ?>
                                <td>
                                    <div class="post_title"><?php echo $value->order_id;?></div>
                                </td>
                                <td><?php echo $value->first_name." ".$value->last_name; ?></td>
                                <td><?php echo $value->code;?></td>
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
                                                <?php if ($value->status_value == 0) { ?>
                                                    <button class="btn btn-small" onclick="active('<?php echo $value->customer_id;?>');">Activar</button>
                                                <?php }else{ ?>
                                                    <button class="btn btn-small" onclick="no_active('<?php echo $value->customer_id;?>');">Desactivar</button>
                                                <?php } ?>
                                          </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
           </form>         
        </div>
    </div>
</div><!-- main content -->
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
<script src="static/cms/js/customer.js"></script>