<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<div class="row-fluid">
    <div class="widget_container">
        <div class="well nomargin">
            <div class="navbar navbar-static navbar_as_heading">
                <div class="navbar-inner">
                    <div class="container" style="width: auto;">
                        <a class="brand">Listado de Comentarios</a>
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
                        <td>Producto</td>
                        <td>Cliente</td>
                        <td>Comentario</td>
                        <td>Fecha de Comentario</td>
                        <td>Estado</td>
                        <td>Acción</td>
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

<script src="<?php echo site_url();?>static/cms/js/comments.js"></script>