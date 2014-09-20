<div class="row-fluid">
    <div class="widget_container">
        <div class="well nomargin">
            <div class="navbar navbar-static navbar_as_heading">
                <div class="navbar-inner">
                    <div class="container" style="width: auto;">
                        <a class="brand">Listado de Productos</a>
                        <a class="btn pull-right" onclick="new_products();" >Agregar</a>
                    </div>
                </div>
            </div>
            <div class="subnav nobg">
                <form method="post" action="<?php echo site_url();?>dashboard/menu">
                 <div class="span2">
                         <input type="text" id="search_text" name="search_text" value="" class="input-xlarge-fluid" placeholder="Menu">
                 </div>
                <div class="span2"> <button type ="submit" class="btn btn-small btn-duadua">Buscar</button> <a href="<?php echo site_url();?>dashboard/menu"><input  type ="button" value="Todos" class="btn btn-small btn-duadua"></button></a></div>
                <div class="span4">
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
                        <td style="width:20px;"><input type="checkbox" id="chkbck" /></td>
                        <td>Nombre</td>
                        <td>Descripcion</td>
                        <td>Categoria</td>
                        <td>Precio</td>
                        <td>Stock</td>
                        <td>Posicion</td>
                        <td>Imagen 1 </td>
                        <td>Imagen 2</td>
                        <td>Imagen 3</td>
                        <td>Estado</td>
                    </tr>
                </thead>
                <tbody> 
                    <?php foreach ($obj_products as $value): ?>
                        <tr>
                            <td>
                                
                                <?php echo $value->product_id == 0 ? "<img src='static/cms/images/warning.gif'>" : "<img src='static/cms/images/ok.gif'>"; ?>
                            </td>
                            
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
                            <td><div class="post_title"><?php echo $value->name;?></div></td>
                            <td><?php echo $value->price; ?></td>
                            <td><?php echo $value->stock; ?></td>
                            <td><?php echo $value->position; ?></td>
                            <td><img src="<?php echo SERVER2.$value->big_image?>" height="42" width="42"></td>
                            <td><img src="<?php echo SERVER2.$value->medium_image?>" height="42" width="42"></td>
                            <td><img src="<?php echo SERVER2.$value->small_image?>" height="42" width="42"></td>
                            <td>
                                <?php if ($value->status_value == 1) {
                                    $valor = "Activo";
                                    $stilo = "label label-success";
                                } elseif($value->status_value == 2) {
                                    $valor = "Destacado";
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

            <!--- FIN DE TABLA DE RE4GISTRO -->


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

<script src="static/cms/js/products.js"></script>