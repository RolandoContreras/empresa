<div class="row-fluid">
			<!-- main content -->
			<div id="main_content" class="span5">
				<div class="widget_container">
					<div class="well nomargin">
						<div class="navbar navbar-static navbar_as_heading">
							<div class="navbar-inner">
								<div class="container" style="width: auto;">
									<a class="brand">Marcas</a>
								</div>
							</div>
						</div>
						<div class="subnav nobg">
							<div class="span6">
								<form method="post" class="form-search" style="margin-bottom:0;">
								  <input name="txt_search" id="txt_search" type="text" class="4search-query" style="width:58%;">
								  <button type="submit" class="btn btn-small btn-duadua">Buscar</button>
								</form>
							</div>
						</div>
						
						<table class="table" id="alltags">
							<thead>
                                                            <tr>
                                                                <td><input type="checkbox" id="chkbck" /></td>
                                                                <td>Nombre</td>
                                                                <td> </td>
                                                                <td>Estatus</td>
                                                            </tr>
							</thead>
							<tbody id="alltags">
                                                        <?php foreach ($obj_brand as $value) { ?>
                                                                <tr>
                                                                    <td><input type="checkbox" class="chkbck" /></td>
                                                                    <td><?php echo $value->name; ?></td>
                                                                    <td>                                                                           
                                                                        <div class="operation">
                                                                            <div class="btn-group" style="display:none;">      
                                                                            <button class="btn btn-small" onclick="edit_brand('<?php echo $value->brand_id; ?>');"></i>Editar</button>
                                                                            <button class="btn btn-small" onclick="eliminar_brand('<?php echo $value->brand_id?>');"></i> Eliminar</button>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><?php if($value->status_value==1){echo 'Activo';}else{echo 'Inactivo';} ?></td>
                                                                </tr>
                                                        <?php } ?>                                                             
							</tbody>
						</table>
                                            <div class="subnav nobg">
                                                <div class="span1"></div>
                                                <div class="span2"></div>
                                                <div class="span1"></div>
                                                <div class="span4">
                                                    <div class="pagination">
                                                        <?php echo $obj_pagination; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
						<div class="alert alert-info" style="margin-bottom:0;">
							<strong>Nota:</strong><br />
							Eliminar una marca no elimina los productos que contienen esa marca.                                                        
						</div>
						
					</div>
				</div>
			</div><!-- main content -->
			
			<div id="right_sidebar" class="span5">
				<div class="widget_container">
					<div class="well">
						<div class="navbar navbar-static navbar_as_heading">
							<div class="navbar-inner">
								<div class="container" style="width: auto;">
									<a class="brand">Agregar Marca</a>
								</div>
							</div>
						</div>
                                                        <input type="hidden" id="tag_id" name="tag_id" value="" />              
							<label>Nombre:</label>
							<input type="text" id="tag_name" class="input-xlarge-fluid" placeholder="Nombre de Tag">							
							<span class="help-block">El nombre con el que anexarás una publicación.</span>										
                                                        
							<label>Estatus:</label>
							<select name="parent" id="tag_status" class="input-xlarge-fluid">
								<option class="level-0" value="1">Activo</option>
								<option class="level-0" value="0">Inactivo</option>
							</select>
							<span class="help-block">Elige si crear el tag activo o inactivo.</span>							
                                                        
							<button id="add_tag" class="btn btn-duadua btn-small"></i> Agregar Nueva Marca</button>
                                            
					</div>
				</div>
			</div>
			
		</div>

    <!-- JS Files
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo site_url();?>static/cms/js/brand.js"></script>
   

