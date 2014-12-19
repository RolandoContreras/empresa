<div class="row-fluid">
			<!-- main content -->
			<div id="main_content" class="span5">
				<div class="widget_container">
					<div class="well nomargin">
						<div class="navbar navbar-static navbar_as_heading">
							<div class="navbar-inner">
								<div class="container" style="width: auto;">
									<a class="brand">Verificaciones</a>
								</div>
							</div>
						</div>
						<div class="subnav nobg">
							<div class="span6">
								<form method="post" class="form-search" style="margin-bottom:0;">
								  <input name="txt_search" id="txt_search" type="text" class="4search-query" style="width:58%;">
								  <button type="submit" class="btn btn-small btn-duadua">Search</button>
								</form>
							</div>
						</div>
						
						<table class="table" id="alltags">
							<thead>
                                                            <tr>
                                                                <td><input type="checkbox" id="chkbck" /></td>
                                                                <td>Nombre</td>
                                                                <td> </td>
                                                                <td>Acciones</td>
                                                            </tr>
							</thead>
							<tbody id="alltags">
                                                                <tr>
                                                                    <td><input type="checkbox" class="chkbck" /></td>
                                                                    <td>Verificar estado de las cuentas</td>
                                                                    <td></td>
                                                                    <td>
                                                                        <div class="operation">
                                                                            <div class="btn-group" style="display:none;">      
                                                                                <button class="btn btn-small" onclick="verify_status_count('<?php echo $value->tag_id; ?>');"><i>Verificar</i></button>
                                                                            </div>
                                                                        </div> 
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" class="chkbck" /></td>
                                                                    <td>Enviar e-mail a cuentas inactivas</td>
                                                                    <td></td>
                                                                    <td>
                                                                        <div class="operation">
                                                                            <div class="btn-group" style="display:none;">      
                                                                                <button class="btn btn-small" onclick="edit_tag('<?php echo $value->tag_id; ?>');"><i>Enviar E-mail</i></button>
                                                                            </div>
                                                                        </div> 
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" class="chkbck" /></td>
                                                                    <td>Enviar e-mail perzonalizados</td>
                                                                    <td></td>
                                                                    <td>
                                                                        <div class="operation">
                                                                            <div class="btn-group" style="display:none;">      
                                                                                <button class="btn btn-small" onclick="edit_tag('<?php echo $value->tag_id; ?>');"><i>Ir</i></button>
                                                                            </div>
                                                                        </div> 
                                                                    </td>
                                                                </tr>
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
						</div>
					</div>
				</div>
			</div>
		</div>
    <script src="<?php echo site_url();?>static/cms/js/verify.js"></script>
   

