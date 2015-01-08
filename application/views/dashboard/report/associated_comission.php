<link href="static/cms/plugins/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" />
<link href="static/cms/plugins/datepicker/css/datepicker.css" rel="stylesheet" />
<script src="static/cms/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<!-- main content -->
<form id="product-form" name="product-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/reportes_asociados/export";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario de Asociados</a>
                                        <a class="brand"></i> Excel</a>
                                        <a class="brand"></i> PDF</a>
                                </div>
                        </div>
                </div>
                <div class="well nomargin" style="width: 800px;">
                    <div class="span1"><strong>Activos</strong></div>
                    <div class="span3">
                            <input type="checkbox" value="" name="date_ini" id="date_ini" size="5" style="width: 100px;">
                    </div>
                    
                    <div class="span1"><strong>Inactivos</strong></div>
                    <div class="span2">
                            <input type="checkbox" value="" name="date_ini" id="date_ini" size="5" style="width: 100px;">
                    </div>
                    <br/><br/><br/>
              
                <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancelar_comission();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Generar</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</div>
</form>