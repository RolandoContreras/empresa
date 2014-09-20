<link href="static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="static/cms/js/core/bootstrap-fileupload.js"></script>
<script src="static/cms/js/products.js"></script>
<!-- main content -->

<form id="product-form" name="product-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/productos/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario Productos</a>
                                </div>
                        </div>
                </div>
                <input type="hidden" name="product_id" value="<?php echo isset($obj_product)?$obj_product->product_id:"";?>">
              
                <div class="well nomargin" style="width: 200px;">
                <div class="inner">
                <strong>Categoría:</strong>
                    <select name="id_category" id="id_category">
                    <option value="">[ Seleccionar ]</option>
                        <?php foreach ($obj_category as $value ): ?>
                    <option value="<?php echo $value->id_category;?>"
                        <?php 
                                if(isset($obj_product->id_category)){
                                        if($obj_product->id_category==$value->id_category){
                                            echo "selected";
                                        }
                                }else{
                                          echo "";
                                }
                        
                        ?>><?php echo $value->name;?>
                    </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                </div>
              
              <input type="hidden" name="movie_id" value="<?php echo isset($obj_product->product_id)?$obj_product->product_id:"";?>">
              <br><br>
              <input type="text" id="tittle" name="tittle" value="<?php echo isset($obj_product->name)?$obj_product->name:"";?>" class="input-xlarge-fluid" placeholder="Nombre">
              <br><br>
              <textarea name="description" id="description" placeholder="Descripcion ..." style="width: 90%; height: 100px;"><?php echo isset($obj_product->description)?$obj_product->description:"";?></textarea>
              <br><br>
              <input type="text" id="price" name="price" value="<?php echo isset($obj_product->price)?$obj_product->price:"";;?>" class="input-small-fluid" placeholder="Precio">
              <br><br>
              <input type="text" id="stock" name="stock" value="<?php echo isset($obj_product->stock)?$obj_product->stock:"";;?>" class="input-small-fluid" placeholder="Stock"><br>
              <br>
              <input name="position" type="text" class="input-small-fluid" id="position" placeholder="Posición" value="<?php echo isset($obj_product->position)?$obj_product->position:"";?>" size="3" maxlength="3">
              <br><br>
                                                
            <!------------------------------------>
                
                <div class="tab-content myTabContent" style="width: 99%;">
                    <div class="tab-pane fade in active" id="WEA1">
                        <div class="tabbable tabs-left xdefault">
                            <div class="tab-content" style="width: 32%; float: left; margin-right: 1%;">
                                <div class="inner">
                                    <div data-provides="fileupload" class="fileupload fileupload-new">
                                        <input type="hidden" value="<?php echo isset($obj_product->big_image)?$obj_product->big_image:"";?>" id="big_image" name="big_image">
                                        <span class="help-block"><center>Ancho:117px X Alto:171px</center></span>
                                        <div style="max-width: 227px; max-height: 276px; line-height: 20px;" class="fileupload-new thumbnail">
					<?php if (isset($obj_product->big_image)==""){?>
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image">
                                        <?php }else{ ?>
                                                <img class="thumbnail_videosmall" src="<?php echo SERVER2.$obj_product->big_image?>">
                                        <?php } ?>
                                        </div>
                                        <div style="max-width: 227px; max-height: 276px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail">

                                        </div>
                                        <br>
                                        <div>
                                          <span class="btn btn-file">
                                              <span class="fileupload-new">Seleccionar Imagen</span>
                                              <span class="fileupload-exists">Cambiar</span>
                                              <input type="file" name="big_image" id="big_image">
                                          </span>
                                          <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Eliminar</a>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        
                            <!-------------------------------------------------------------> 
                            
                              <div class="tab-content" style="width: 32%; float: left; margin-right: 1%; ">
                                <div class="inner">
                                    <div data-provides="fileupload" class="fileupload fileupload-new">
                                        <input type="hidden" value="<?php echo isset($obj_product->medium_image)?$obj_product->medium_image:"";?>" id="medium_image" name="medium_image">
                                        <span class="help-block"><center>Ancho:227px X Alto:276px</center></span>
                                        <div style="max-width: 227px; max-height: 276px; line-height: 20px;" class="fileupload-new thumbnail">
					<?php if (isset($obj_product->medium_image)==""){?>
                                               <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image">
                                        <?php }else{ ?>
                                       
                                                <img src="<?php echo SERVER2.$obj_product->medium_image;?>">
                                                
                                        <?php } ?>
                                        </div>
                                        <div style="max-width: 227px; max-height: 276px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail">

                                        </div>
                                        <br>
                                        <div>
                                          <span class="btn btn-file">
                                              <span class="fileupload-new">Seleccionar Imagen</span>
                                              <span class="fileupload-exists">Cambiar</span>
                                              <input type="file" name="medium_image" id="medium_image"></span>
                                          <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Eliminar</a>
                                        </div>
                                    </div>                                     
                                </div>
                            </div>
                            <!-------------------------------------------------------->
                               <div class="tab-content" style="width: 32%; float: left; margin-right: 1%;">
                                <div class="inner">
                                    <div data-provides="fileupload" class="fileupload fileupload-new">
                                        <input type="hidden" value="<?php echo isset($obj_product->small_image)?$obj_product->small_image:"";?>" id="small_image" name="small_image">
                                        <span class="help-block"><center>Ancho:433px X Alto:276px</center></span>
                                        <div style="max-width: 433px; max-height: 276px; line-height: 20px;" class="fileupload-new thumbnail">
					<?php if (isset($obj_product->small_image)==""){?>
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image">
                                        <?php }else{ ?>
                                                <img src="<?php echo SERVER2.$obj_product->small_image?>">
                                        <?php } ?>
                                        </div>
                                        <div style="max-width: 433px; max-height: 276px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail">

                                        </div>
                                        <br>
                                        <div>
                                          <span class="btn btn-file">
                                              <span class="fileupload-new">Seleccionar Imagen</span>
                                              <span class="fileupload-exists">Cambiar</span>
                                              <input type="file" name="small_image" id="small_image"></span>
                                          <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Eliminar</a>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
              <br><br>
              <div class="well nomargin" style="width: 200px;">
                    <div class="inner">
                        <strong>Estado:</strong>
                        <select name="status_value" id="status_value">
                            <option value="">[ Seleccionar ]</option>
                            <option value="1"  <?php echo isset($obj_product->status_value)=="1"?'selected':'';?>>Activo </option>
                            <option value="0"  <?php echo isset($obj_product->status_value)=="0"?'selected':'';?>>Inactivo</option>
                        </select>
                        
                    </div>
                </div>
                <br><br>

                <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancelar_product();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
