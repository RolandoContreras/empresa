<link href="static/cms/plugins/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" />
<link href="static/cms/plugins/datepicker/css/datepicker.css" rel="stylesheet" />
<script src="static/cms/plugins/datepicker/js/bootstrap-datepicker.js"></script>

<!-- main content -->
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <form action="<?php echo site_url();?>dashboard/reportes_comision/export_excel" method="post">
                    <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: auto;">
                                            <a class="brand"></i> Formulario Reportes por Comisión</a>
                                            <input type="hidden" name="date_ini" value="<?php echo $date_ini;?>" />
                                            <input type="hidden" name="date_end" value="<?php echo $date_end;?>" />
                                            <button class="pull-right" type="submit"><img src="static/cms/images/excel.png" style="width:40px; cursor: pointer;" alt="excel" title="excel"/></button>
                                    </div>
                            </div>
                    </div>
                </form> 
                
             <form id="product-form" name="product-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/reportes_comision";?>">
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
                    
                    <br/>
                    <!--- INCIO DE TABLA DE RE4GISTRO -->
                            <table class="table smallfont">
                                <thead>
                                    <tr>
                                        <td>NOMBRES</td>
                                        <td>TIPO DE COMISION</td>
                                        <td>FECHA</td>
                                        <td>MONTO</td>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php $total = 0;?>
                                    <?php foreach ($obj_comission as $value): ?>
                                        <tr>
                                            <td><?php echo $value->first_name." ".$value->last_name;?></td>
                                            <td><?php echo $value->name; ?></td>
                                            <td><?php echo formato_fecha($value->date);?></td>
                                            <td><div class="post_title"><?php echo $value->amount;?></div></td>
                                        </tr>
                                        <?php $total = $total + $value->amount;?>
                                    <?php endforeach; ?>
                                        <?php 
                                        if(count($obj_comission) > 0){ ?>
                                            <tr>
                                                <td colspan="3" style="text-align:right;padding-right: 80px;">TOTAL</td>
                                                <td><div class="post_title"><?php echo $total; ?></div></td>
                                            </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
            <!--FIN DE TABLA DE RE4GISTRO -->
                <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancelar_comission();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Enviar</button>
                </div>
            </div>
           </form>         
        </div>
    </div>
</div><!-- main content -->
</div>

<script type="text/javascript">
   $(function(){        
        $('#dp3').datepicker();
        $('#dp4').datepicker();
    });
    function cancelar_comission(){
	var url= 'dashboard/reportes_comision';
	location.href = site+url;
}
  </script>