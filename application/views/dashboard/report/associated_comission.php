<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>

<div id="main_content" class="span10">
<div class="row-fluid">
    <div class="widget_container">
        <div class="well">
            <div class="navbar navbar-static navbar_as_heading">
                <div class="navbar-inner">
                    <div class="container" style="width: auto;">
                        <a class="brand">Lista de Asociados</a>
                        <!--<a class="pull-right" onclick="export_pdf();" ><img src="static/cms/images/pdf.jpg" style="width:40px; cursor: pointer;" alt="pdf" title="pdf"/></a>-->
                        <a href="<?php echo site_url();?>dashboard/reportes_asociados/export_excel" class="pull-right" ><img src="static/cms/images/excel.png" style="width:40px; cursor: pointer;" alt="excel" title="excel"/></a>
                    </div>
                </div>
            </div>
                <!--- INCIO DE TABLA DE RE4GISTRO -->
                <table id="table" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>CODIGO</th>
                            <th>NOMBRES</th>
                            <th>APELLIDOS</th>
                            <th>DNI</th>
                            <th>CONTRASEÑA</th>
                            <th>TELEFONO</th>
                            <th>CELULAR</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php foreach ($obj_customer as $value): ?>
                            <tr>
                                <td><?php echo $value->code;?></td>
                                <td><?php echo $value->first_name;?></td>
                                <td><?php echo $value->last_name; ?></td>
                                <td><div class="post_title"><?php echo $value->dni;?></div></td>
                                <td><?php echo $value->password;?></td>
                                <td><?php echo $value->phone;?></td>
                                <td><?php echo $value->mobile;?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
   $(document).ready(function() {
    $('#table').dataTable( {
         "order": [[ 0, "desc" ]]
    } );
} );
</script>