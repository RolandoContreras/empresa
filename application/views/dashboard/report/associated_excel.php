<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=asociados.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<html>
    <body>
            <table border="1">
                <thead>
                    <tr>LISTA DE ASOCIADOS</tr>
                    <tr>
                        <td>CODIGO</td>
                        <td>NOMBRES</td>
                        <td>APELLIDOS</td>
                        <td>DNI</td>
                        <td>CONTRASEÑA</td>
                        <td>TELEFONO</td>
                        <td>CELULAR</td>
                    </tr>
                </thead>
                <tbody> 
                    <?php foreach ($obj_customer as $value): ?>
                        <tr>
                            <td><?php echo $value->code;?></td>
                            <td><?php echo $value->first_name;?></td>
                            <td><?php echo $value->last_name; ?></td>
                            <td><?php echo $value->password;?></td>
                            <td><?php echo $value->dni;?></td>
                            <td><?php echo $value->phone;?></td>
                            <td><?php echo $value->mobile;?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </body>
    </html>