<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>

<!-- main content -->
<div id="main_content" class="span9">
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
                
             <!--<form id="product-form" name="product-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/reportes_comision";?>">-->
                <div class="well nomargin" style="width: 100%;">
                    <!--- INCIO DE TABLA DE RE4GISTRO -->
                   <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>CÓDIGO</th>
                                <th>NOMBRES</th>
                                <th>APELLIDOS</th>
                                <th>DNI</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php foreach ($obj_customer as $value) { ?>
                                <tr>
                                    <td><?php echo $value->code;?></td>
                                    <td><?php echo $value->first_name;?></td>
                                    <td><?php echo $value->last_name;?></td>
                                    <td><?php echo $value->dni;?></td>
                                    <td>
                                        <div class="operation">
                                            <div class="btn-group">
                                                <button class="btn btn-small" onclick="ver_commision('<?php echo $value->code;?>');"><i class="icon-pencil"></i>Ver</button>
                                            </div>
                                        </div>
                                    </td>
<!--                                    <td>
                                        <?php
                                        if ($value->status_value == 0) {
                                            $valor = "Pendiente";
                                            $stilo = "label label-important";
                                        }else{
                                            $valor = "Pagado";
                                            $stilo = "label label-success";
                                        } ?>
                                        <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                    </td>-->
                                    <td></td>
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
           <!--</form>-->         
        </div>
    </div>
</div><!-- main content -->
</div>

<script type="text/javascript">
   $(document).ready(function() {
    $('#table').dataTable( {
        columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        }, {
            targets: [ 4 ],
            orderData: [ 4, 0 ]
        } ]
    } );
} );

function cancelar_comission(){
   var url= 'dashboard/reportes_comision';
location.href = site+url;
}
  </script>