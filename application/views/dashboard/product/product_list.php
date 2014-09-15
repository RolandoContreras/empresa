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
            <div class="subnav">
                <div class="btn-toolbar pull-left">
                    <div class="btn-group">
                            <button class="btn btn-small active btn-duadua">All<span class="badge abs1">90</span></button>
                            <button class="btn btn-small btn-duadua"><i class="icon-ok-3"></i> Published <span class="badge badge-info abs1">90</span></button>
                            <button class="btn btn-small btn-duadua"><i class="icon-pencil"></i> Draft <span class="badge badge-warning abs1">0</span></button>
                            <button class="btn btn-small btn-duadua"><i class="icon-trash-2 btn-duadua"></i> Trash <span class="badge badge-important abs1">0</span></button>
                    </div>
                </div>
            </div>                
            <div class="subnav nobg">
                <form method="post" action="<?php echo site_url();?>dashboard/menu">
                 <div class="span2">
                         <input type="text" id="search_text" name="search_text" value="" class="input-xlarge-fluid" placeholder="Menu">
                 </div>
                <div class="span2"> <button type ="submit" class="btn btn-small btn-duadua">Buscar</button> <a href="<?php echo site_url();?>dashboard/menu"><input  type ="button" value="Todos" class="btn btn-small btn-duadua"></button></a></div>
                
                <div class="span1">
                    <div id="inner_search_menu_1">
                        
                    </div>
                </div>
                <div class="span2"></div>
                <div class="span1"></div>
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
                        <td>Categoria</td>
                        <td>Nombre</td>
                        <td>Descripcion</td>
                        <td>Precio</td>
                        <td>Stock</td>
                        <td>Imagen</td>
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
                            </td>
                            <td>
                                <div class="post_title"><?php echo $value->name; ?>
                                    <div class="operation">
                                        <div class="btn-group">
                                            <button class="btn btn-small" onclick="edit_menu('<?php echo $value->product_id; ?>');"><i class="icon-pencil"></i> Editar</button>
                                            <button class="btn btn-small"><i class="icon-trash-1"></i>Eliminar</button>
                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td><?php echo $value->description; ?></td>
                            <td><?php echo $value->price; ?></td>
                            <td><?php echo $value->stock; ?></td>
                            <td></td>
                            <td>
                                <?php if ($value->status_value == 1) {
                                    $valor = "Activo";
                                    $stilo = "label label-success";
                                } else {
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