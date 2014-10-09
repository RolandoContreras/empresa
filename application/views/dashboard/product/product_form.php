<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<link href="<?php echo site_url();?>static/cms/plugins/tags/chosen.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/plugins/tags/chosen.jquery.js"></script>
<script src="<?php echo site_url();?>static/cms/js/products.js"></script>
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
                <input type="hidden" name="categories_kind_id" value="<?php echo isset($obj_product)?$obj_product->categories_kind_id:"";?>">
                <input type="hidden" name="brand_categories_id" value="<?php echo isset($obj_product)?$obj_product->brand_categories_id:"";?>">
              
                <div class="well nomargin" style="width: 800px;">
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
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <strong>Genero:</strong>
                        <select name="gender" id="gender">
                        <option value="">[ Seleccionar ]</option>
                        <?php 
                        if(isset($obj_product->category_name)){ ?>
                                <option value="Hombres" <?php echo $obj_product->category_name=="Hombres"?'selected':'';?>>Hombres</option>
                                <option value="Mujeres" <?php echo $obj_product->category_name=="Mujeres"?'selected':'';?>>Mujeres</option>
                                <option value="Kids" <?php echo $obj_product->category_name=="Kids"?'selected':'';?>>Kids</option>
                        <?php }else{ ?>
                                <option value="Hombres">Hombres</option>
                                <option value="Mujeres">Mujeres</option>
                                <option value="Kids">Kids</option>
                        <?php } ?>
                        
                        </select>
                    </div>
                    <br/>
                    <div class="inner">
                        <strong>Marca:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select name="brand" id="brand">
                        <option value="">[ Seleccionar ]</option>
                            <?php foreach ($obj_brand as $value ): ?>
                        <option value="<?php echo $value->brand_id;?>"
                            <?php 
                                    if(isset($obj_product->brand_id)){
                                            if($obj_product->brand_id==$value->brand_id){
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
              <input name="pay_sale" type="text" class="input-small-fluid" id="comision" placeholder="Comision" value="<?php echo isset($obj_product->pay_sale)?$obj_product->pay_sale:"";?>">
              <br><br>
                                                
            <!------------------------------------>
                           <!-- TAB -->
               
                <ul class="nav nav-tabs myTab smallfont" style="width: 99%;">
                    <li class="active"><a href="#WEA1" data-toggle="tab"><i class="icon-large icon-th"></i>IMAGENES</a></li>                    
                    <li><a href="#WEA5" data-toggle="tab"><i class="icon-large icon-th"></i> TAGS</a></li>
                </ul>    
            
            
                <div class="tab-content myTabContent" style="width: 99%;">
                    <div class="tab-pane fade in active" id="WEA1">
                        <div class="tabbable tabs-left xdefault">
                            <div class="tab-content" style="width: 32%; float: left; margin-right: 1%;">
                                <div class="inner">
                                    <div data-provides="fileupload" class="fileupload fileupload-new">
                                        <input type="hidden" value="<?php echo isset($obj_product->big_image)?$obj_product->big_image:"";?>" id="big_image" name="big_image">
                                        <span class="help-block"><center>Ancho:300px X Alto:300px</center></span>
                                        <div style="max-width: 300px; max-height: 300px; line-height: 20px;" class="fileupload-new thumbnail">
					<?php if (isset($obj_product->big_image)==""){?>
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image">
                                        <?php }else{ ?>
                                                <img class="thumbnail_videosmall" src="<?php echo SERVER2.$obj_product->big_image?>">
                                        <?php } ?>
                                        </div>
                                        <div style="max-width: 300px; max-height: 300px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail">

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
                                        <span class="help-block"><center>Ancho:300px X Alto:300px</center></span>
                                        <div style="max-width: 300px; max-height: 300px; line-height: 20px;" class="fileupload-new thumbnail">
					<?php if (isset($obj_product->medium_image)==""){?>
                                               <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image">
                                        <?php }else{ ?>
                                       
                                                <img src="<?php echo SERVER2.$obj_product->medium_image;?>">
                                                
                                        <?php } ?>
                                        </div>
                                        <div style="max-width: 300px; max-height: 300px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail">

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
                                        <span class="help-block"><center>Ancho:300px X Alto:300px</center></span>
                                        <div style="max-width: 300px; max-height: 300px; line-height: 20px;" class="fileupload-new thumbnail">
					<?php if (isset($obj_product->small_image)==""){?>
                                                <img src="http://www.placehold.it/300x300/EFEFEF/AAAAAA&amp;text=no+image">
                                        <?php }else{ ?>
                                                <img src="<?php echo SERVER2.$obj_product->small_image?>">
                                        <?php } ?>
                                        </div>
                                        <div style="max-width: 300px; max-height: 300px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail">

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
                            <!-------------------------------------------------------->
                            <div class="tab-content">
                                <div class="inner">
                                    <div data-provides="fileupload" class="fileupload fileupload-new">
                                        <input type="hidden" value="<?php echo isset($obj_product->custom_image)?$obj_product->custom_image:"";?>" id="custom_image" name="custom_image">
                                        <span class="help-block"><center>Ancho:368px X Alto:171px</center></span>
                                        <div style="max-width: 368px; max-height: 171px; line-height: 20px;" class="fileupload-new thumbnail">
					<?php if (isset($obj_product->custom_image)==""){?>
                                                <img src="http://www.placehold.it/368x171/EFEFEF/AAAAAA&amp;text=no+image">
                                        <?php }else{ ?>
                                                <img src="<?php echo SERVER2.$obj_product->custom_image?>">
                                        <?php } ?>
                                        </div>
                                        <div style="max-width: 368px; max-height: 171px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail">

                                        </div>
                                        <br>
                                        <div>
                                          <span class="btn btn-file">
                                              <span class="fileupload-new">Seleccionar Imagen</span>
                                              <span class="fileupload-exists">Cambiar</span>
                                              <input type="file" name="custom_image" id="custom_image"></span>
                                          <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Eliminar</a>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                           <!--------------------------------------------------------> 
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="WEA5">
                        <div class="tabbable tabs-left xdefault">
                            <div class="tab-content fix_tags" style="width: 737px;">
                                <div class="inner">
                                    <div class="side-by-side clearfix">       
                                        
                                        
                        <select  data-placeholder="Tags" style="width:350px;" multiple class="chzn-select " tabindex="8" name ="tags" id="tags">
                            <option value = ""></option>
                            <?php foreach ($obj_tags as $obj_tags):
                                    $selected = get_tag($obj_product->tags,$obj_tags->name);
                                ?>
                                <option <?php echo $selected;?>><?php echo $obj_tags->name;?></option>
                            <?php endforeach;?>
                         </select> 
                                    </div>
                                    
                                    <input type="hidden" name="tag" id="tag" value="<?php echo isset($obj_product->tags)?$obj_product->tags:"";?>">
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
<script type="text/javascript">
    var show = '<?php echo $modulos?>';
    $(".chzn-select").chosen();
    
    $("#tags").chosen().change( function(e){
        $("#tag").val($(this).val());
    });         
    
    $('#timepicker1').timepicker({
        minuteStep: 1,    
        showSeconds: true,
        showMeridian: false,
        showInputs: true
    });
        
    $('#timepicker1').on('change', function() {                
        $("#time").val($(this).val());        
    });
    

</script>
