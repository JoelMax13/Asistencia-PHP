<?php
    include ("../Controladores/CrearConexion.php");
    include ("../Controladores/Funciones.php");
    header("Content-Type: application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=datos.xls");
?>
<table>
    <tr>
        <th>N°</th>
        <th>Nombre Apellido</th>
        <th>CI</th>
        <th>Cargo</th>
    </tr>
    <tr>
        <?php
            $proy = GetProyecto($conexion, 'Proyecto C');
            echo '<td>'.$proy["PRO_ID"].'</td>
            <td>ANDRÉS MOLINA</td>';
        ?>
    </tr>
</table>