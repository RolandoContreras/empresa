<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=comision.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<html>
    <body>
            <table border="1">
                <thead>
                    <tr>LISTA COMISION DEL <?php echo strtoupper(formato_fecha($date_ini));?> HASTA <?php echo strtoupper(formato_fecha($date_end));?></tr>
                    <tr>
                        <td>NOMBRES</td>
                        <td>TIPO DE COMISION</td>
                        <td>FECHA</td>
                        <td>MONTO</td>
                    </tr>
                </thead>
                <tbody> 
                    <?php $total = 0;?>
                    <?php foreach($obj_comission as $value): ?>
                        <tr>
                            <td><?php echo $value->first_name." ".$value->first_name;?></td>
                            <td><?php echo convert_query(convert_slug($value->name)); ?></td>
                            <td><?php echo formato_fecha($value->date);?></td>
                            <td><?php echo $value->amount;?></td>
                        </tr>
                    <?php $total = $total + $value->amount;?>
                    <?php endforeach; ?>
                        <tr>
                            <td colspan="3" style="text-align:right;padding-right: 80px;">TOTAL</td>
                            <td><?php echo $total;?></td>
                        </tr>
                </tbody>
            </table>
        </body>
    </html>