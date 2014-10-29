<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<div class="row-fluid">
    <div class="widget_container">
        <div class="well nomargin">
            <div class="navbar navbar-static navbar_as_heading">
                <div class="navbar-inner">
                    <div class="container" style="width: auto;">
                        <a class="brand">Listado de Pedidos</a>
                    </div>
                </div>
            </div>
            <div class="subnav nobg">
                <form method="post" action="<?php echo site_url();?>dashboard/productos">
                 <div class="span2">
                         <input type="text" id="search_text" name="search_text" value="" class="input-xlarge-fluid" placeholder="Producto">
                 </div>
                <div class="span2"> <button type ="submit" class="btn btn-small btn-duadua">Buscar</button> <a href="<?php echo site_url();?>dashboard/menu"><input  type ="button" value="Todos" class="btn btn-small btn-duadua"></button></a></div>
                <div class="span8">
                    <div class="pagination">
                        <?php echo $pagination; ?>
                    </div>
                </div>
                </form>
            </div>

            <!--- INCIO DE TABLA DE RE4GISTRO -->

            <table class="table smallfont">
                <thead>
                    <tr>
                        <td>Numero de Pedido</td>
                        <td>Cliente</td>
                        <td>Código</td>
                        <td>Estado</td>
                        <td>Operación</td>
                    </tr>
                </thead>
                <tbody> 
                    <?php foreach ($obj_customer as $value): ?>
                        <tr>
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
            <div class="subnav nobg">
                <div class="span2"></div>
                <div class="span1"></div>
                <div class="span2"></div>
                <div class="span2"></div>
                <div class="span1"></div>
                <div class="span4">
                    <div class="pagination">
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="static/cms/js/customer.js"></script>