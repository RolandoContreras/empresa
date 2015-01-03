<script src="<?php echo site_url();?>static/cms/js/comission_report.js"></script>
<!-- main content -->
<form id="product-form" name="product-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/reportes_comision/export";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario Reportes por Comisión</a>
                                </div>
                        </div>
                </div>
                
                <div class="well nomargin" style="width: 800px;">
                    <div class="inner">
                    <strong>De:</strong>
                        <input type="text" name="date_ini" />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <strong>Hasta:</strong>
                        <input type="text" name="date_end" />
                    </div>
                    <br/>
              
                <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancelar_comission();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Exportar</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>

