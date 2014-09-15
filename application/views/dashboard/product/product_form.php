<link href="static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="static/cms/js/core/bootstrap-fileupload.js"></script>
<script src="static/cms/js/products.js"></script>
<!-- main content -->
 
<form id="menu-form" name="menu-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/menu/validate";?>">
    
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"><i class="icon-th-large-1"></i> Formulario Productos</a>
                                </div>
                        </div>
                </div>
                <input type="hidden" name="menu_id" value="<?php echo  $obj_menu->menu_id;?>">
              
                <div class="well nomargin" style="width: 200px;">
                    <div class="inner">
                         <strong>Categoría:</strong>
                <select name="parent_menu_id" id="parent_menu_id">
                <option value="">[ Seleccionar ]</option>
               <?php
                    foreach ($obj_menu_parent as $value ): ?>
                    <option value="<?php echo $value->menu_id;?>"<?php echo $value->menu_id==$obj_menu->parent_menu_id?"selected":"";?>><?php echo $value->tittle;?></option>
                <?php endforeach; ?>
                </select>
                </div>
                </div>
              
              
              <br><br>
              <input type="text" id="tittle" name="tittle" value="<?php echo $obj_menu->tittle;?>" class="input-xlarge-fluid" placeholder="Titulo Menu">
              <br><br>
              <input type="text" id="url" name="url" value="<?php echo $obj_menu->url;?>" class="input-xlarge-fluid" placeholder="URL Menu"><br>
                <br>
                <input name="position" type="text" class="input-xlarge-fluid" id="position" placeholder="Posición" value="<?php echo $obj_menu->position;?>" size="3" maxlength="3">
                <br><br>
              <div class="well nomargin" style="width: 200px;">
                    <div class="inner">
                        <strong>Estado:</strong>
                        <select name="status_value" id="status_value">
                            <option value="">[ Seleeccionar ]</option>
                            <option value="1"  <?php echo $obj_menu->status_value=="1"?'selected':'';?>>Activo </option>
                            <option value="0"  <?php echo $obj_menu->status_value=="0"?'selected':'';?>>Inactivo</option>
                        </select>
                        
                    </div>
                </div>
                
                <br><br>
                <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancelar_menu();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
                    
                </div>
                
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
