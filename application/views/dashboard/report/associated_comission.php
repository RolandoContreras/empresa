<div class="row-fluid">
    <div class="widget_container">
        <div class="well nomargin">
            <div class="navbar navbar-static navbar_as_heading">
                <div class="navbar-inner">
                    <div class="container" style="width: auto;">
                        <a class="brand">Lista de Asociados</a>
                        <!--<a class="pull-right" onclick="export_pdf();" ><img src="static/cms/images/pdf.jpg" style="width:40px; cursor: pointer;" alt="pdf" title="pdf"/></a>-->
                        <a href="<?php echo site_url();?>dashboard/reportes_asociados/export_excel" class="pull-right" ><img src="static/cms/images/excel.png" style="width:40px; cursor: pointer;" alt="excel" title="excel"/></a>
                    </div>
                </div>
            </div>
            <div class="subnav nobg">
                <form method="post" action="<?php echo site_url();?>dashboard/reportes_asociados/export_excel">
                 <div class="span2">
                 </div>
                <div class="span2"></div>
                <div class="span8">
                    <div class="pagination">
                        <?php echo $pagination; ?>
                    </div>
                </div>
                </form>
            </div>

            <!--- INCIO DE TABLA DE RE4GISTRO -->
            <table class="table smallfont">
                <thead>
                    <tr>
                        <td>CODIGO</td>
                        <td>APELLIDOS</td>
                        <td>NOMBRES</td>
                        <td>DNI</td>
                        <td>TELEFONO</td>
                        <td>CELULAR</td>
                    </tr>
                </thead>
                <tbody> 
                    <?php foreach ($obj_customer as $value): ?>
                        <tr>
                            <td><?php echo $value->code;?></td>
                            <td><?php echo $value->last_name; ?></td>
                            <td><?php echo $value->first_name;?></td>
                            <td><div class="post_title"><?php echo $value->dni;?></div></td>
                            <td><?php echo $value->phone;?></td>
                            <td><?php echo $value->mobile;?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!--- FIN DE TABLA DE RE4GISTRO -->
            <div class="subnav nobg">
                <div class="span2"></div>
                <div class="span1"></div>
                <div class="span2"></div>
                <div class="span2"></div>
                <div class="span1"></div>
                <div class="span4">
                    <div class="pagination">
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>