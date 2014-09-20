<script src="static/cms/js/categories.js"></script>
<!-- main content -->

<form id="product-form" name="product-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/categorias/validate";?>">
    
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario Categorias</a>
                                </div>
                        </div>
                </div>
             <input type="hidden" name="id_category" value="<?php echo isset($obj_categories)?$obj_categories->id_category:"";?>">
              <input type="text" id="name" name="name" value="<?php echo isset($obj_categories->name)?$obj_categories->name:"";?>" class="input-xlarge-fluid" placeholder="Nombre">
              <br><br>
              <textarea name="observation" id="observation" placeholder="Observaciones ..." style="width: 90%; height: 100px;"><?php echo isset($obj_categories->observation)?$obj_categories->observation:"";?></textarea>
              <br><br>
              <div class="well nomargin" style="width: 200px;">
                    <div class="inner">
                        <strong>Estado:</strong>
                        <select name="status_value" id="status_value">
                            <option value="">[ Seleccionar ]</option>
                            <option value="1"  <?php echo isset($obj_categories->status_value)=="1"?'selected':'';?>>Activo </option>
                            <option value="0"  <?php echo isset($obj_categories->status_value)=="0"?'selected':'';?>>Inactivo</option>
                        </select>
                        
                    </div>
                </div>
                <br><br>

                <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancelar_categories();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
