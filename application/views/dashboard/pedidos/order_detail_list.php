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
                </div>
                </form>
            </div>

            <!--- INCIO DE TABLA DE RE4GISTRO -->

            <table class="table smallfont">
                <thead>
                    <tr>
                        <td>Producto</td>
                        <td>Imagen</td>
                        <td>Precio</td>
                        <td>Cantidad</td>
                        <td>SubTotal</td>
                        <td>Estado</td>
                    </tr>
                </thead>
                <tbody> 
                    <?php foreach ($obj_detail as $value): ?>
                        <tr>
                            <td>
                                <div class="post_title"><?php echo $value->name;?></div>
                            </td>
                            <td><img src="<?php echo SERVER2.$value->big_image;?>" height="42" width="42"></td>
                            <td><?php echo format_number($value->price);?></td>
                            <td><?php echo $value->quantity; ?></td>
                            <td><?php echo format_number($value->subtotal);   ?></td>
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
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!--- FIN DE TABLA DE RE4GISTRO -->


            <div class="subnav nobg">
                <div class="span2"></div>
                <div class="span1"></div>
                <div class="span2"></div>
                <div class="span2"></div>
                <div class="span1"></div>
                <div class="span4">
                </div>
            </div>
        </div>
    </div>
</div>

<script src="static/cms/js/products.js"></script>