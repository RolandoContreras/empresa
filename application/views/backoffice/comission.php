<script src="<?php echo site_url();?>static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="<?php echo site_url();?>static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>
<article class="main-content homepage" style="padding-bottom:10%;">
	<div class="breadcrumbs transition" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo site_url().'home';?>">Home</a> | <a>Comisiones</a>
                </li>
            </ul>
	</div>
	
        <div class="pull-right">    

            <div style="padding-right: 25px; padding-bottom: 1px; font-weight: bold; color: #428bca; font-size: 25px;">BALANCE: <?php echo format_number($balance);?></div>
            <div style="text-align: right; padding-right: 25px;">Total Ganado: <?php echo format_number($total);?></div>
        </div>
        <div class="clearfix"></div>
	
    <div class="content" style="padding-top: 10px;">
	<section class="widget">
            <nav class="abas">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                        <a href="#1" data-toggle="tab">Últimos Pagos</a>
                    </li>
                    <li>
                        <a href="#2" data-toggle="tab">Totales</a>
                    </li>
                </ul>
            </nav>

            <div class="wg-content_nav" style="min-height:700px;">
                <div class="tab-content">
                    <div class="tab-pane active" id="1">
                         <div class='pagination pull-right'></div>   
                         <table id="table" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Bono</th>
                                    <th>Movimiento</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(count($obj_commissions)>0){
                                    foreach ($obj_commissions as $value) { ?>
                                    <tr>
                                        <td><?php echo formato_fecha($value->date);?></td>
                                        <td><?php echo $value->name;?></td>                                
                                        <td><?php echo format_number($value->amount);?></td>
                                        <td><?php echo $value->status_value==0?"Pendiente de Pago":"Pagado";?></td>
                                    </tr>	
                                <?php } 
                                }else{ ?>
                                    <tr>
                                        <td colspan="4">No tiene Comisiones</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="2">
                         <div class='pagination pull-right'></div>   
                         <table id="table" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Bono</th>
                                    <th>Monto</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>Referido Directo</td>
                                        <td>S/.100</td>                                
                                    </tr>
                                    <tr>
                                        <td>Referido Directo</td>
                                        <td>S/.100</td>                                
                                    </tr>
                                    <tr>
                                        <td>Referido Directo</td>
                                        <td>S/.100</td>                                
                                    </tr>
                                    <tr>
                                        <td>Referido Directo</td>
                                        <td>S/.100</td>                                
                                    </tr>
                                    <tr>
                                        <td>Referido Directo</td>
                                        <td>S/.100</td>                                
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</article>
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').dataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
</script>
