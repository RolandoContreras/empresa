<link href="static/cms/plugins/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" />
<link href="static/cms/plugins/datepicker/css/datepicker.css" rel="stylesheet" />
<script src="static/cms/plugins/datepicker/js/bootstrap-datepicker.js"></script>
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
                    
                    <div class="span2"><strong>Fecha de Inicio</strong></div>
                    <div class="span4">
                        <div data-date-format="yyyy-mm-dd" data-date="<?php echo date("Y-m-d");?>" id="dp3" class="input-append date">
                            <input type="text" readonly="" value="<?php echo date("Y-m-d");?>" name="date_ini" id="date_ini" size="5" style="width: 100px;">
                            <span class="add-on"><i class="icon-th"></i></span>
                        </div>
                    </div>
                    
                    
                    <div class="span2"><strong>Fecha de Fin</strong></div>
                    <div class="span4">
                        <div data-date-format="yyyy-mm-dd" data-date="<?php echo date("Y-m-d");?>" id="dp4" class="input-append date">
                            <input type="text" readonly="" value="<?php echo date("Y-m-d");?>" name="date_end" id="date_end" size="5" style="width: 100px;">
                            <span class="add-on"><i class="icon-th"></i></span>
                        </div>
                    </div>
                    
                    <br/><br/><br/>
<!--                    <div class="inner">
                    <strong>De:</strong>
                        <input type="text" name="date_ini" />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <strong>Hasta:</strong>
                        <input type="text" name="date_end" />
                    </div>-->
                    
              
                <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancelar_comission();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Exportar</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</div>
</form>
<script type="text/javascript">
   $(function(){        
        $('#dp3').datepicker();
        $('#dp4').datepicker();
    });
  </script>

