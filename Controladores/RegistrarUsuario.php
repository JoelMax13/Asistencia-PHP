<?php
    // Conexión a la base de datos
    require("CrearConexion.php");
    // $_SESSION['cedula'] = $_POST['Cedula'];
    $cedula = $_POST['Cedula'];
    $nomApe = mb_strtoupper($_POST['Nombres']." ".$_POST['Apellidos']);
    $telf = $_POST['Telf'];
    $cargo = mb_strtoupper($_POST['Cargo']);
    $jornada = $_POST['Jornada'];
    $proyecto = $_POST['Proyecto'];
    $PRO_ID = ObtenerIdProyecto($conexion, $proyecto);

    $ExisteUsuario = BuscarUsuario($conexion,$cedula);

    if($ExisteUsuario){
        $USU_ID = ObtenerIdUsuario($conexion,$cedula);
        $ExisteEnProyecto = ObtenerRelacion($conexion, $USU_ID, $PRO_ID);
        if($ExisteEnProyecto){
            echo '<script language="javascript">alert("Este usuario ya se encuentra en el proyecto!");window.location.href="../Vistas/CrearUsuario.php"</script>';
        }else{
            GuardarProyecto($conexion, $USU_ID, $PRO_ID, $cargo, $jornada);
        }
    }else{
        GuardarTodo($conexion, $cedula, $nomApe, $telf, $cargo, $jornada, $PRO_ID);
    }


    //FUNCIONES UTILIZADAS

    function ObtenerRelacion($conexion, $USU_ID, $PRO_ID){
        //Obtener Id Usuario
        $Select_Relacion = "Select USPR_ID from tbl_usuario_proyecto where (USU_ID = '{$USU_ID}' AND PRO_ID = '{$PRO_ID}')";
        $Relacion = mysqli_query($conexion, $Select_Relacion);
        if((mysqli_num_rows($Relacion)>0)){
            return true;
        } else {
            return false;
        }
    }
    function ObtenerIdProyecto($conexion, $proyecto){
        //Obtener Id Proyecto
        $Select_ProId = "Select PRO_ID from tbl_proyecto where (PRO_NOMBRE = '{$proyecto}')";
        $OBJ_PRO_ID = mysqli_query($conexion, $Select_ProId);
        $ARR_PRO_ID = mysqli_fetch_assoc($OBJ_PRO_ID);
        $PRO_ID = implode($ARR_PRO_ID);
        return $PRO_ID;
    }
    function ObtenerIdUsuario($conexion, $cedula){
        //Obtener Id Usuario
        $Select_UsuId = "Select USU_ID from tbl_usuario where (USU_CEDULA = '{$cedula}')";
        $OBJ_USU_ID = mysqli_query($conexion, $Select_UsuId);
        $ARR_USU_ID = mysqli_fetch_assoc($OBJ_USU_ID);
        $USU_ID = implode($ARR_USU_ID);
        return $USU_ID;
    }
    function BuscarUsuario($conexion, $cedula){
        //Buscar Usuario
        $Select_BusquedaUsu = "Select USU_ID from tbl_usuario where (USU_CEDULA = '{$cedula}')";
        $Resultado = mysqli_query($conexion, $Select_BusquedaUsu);
        if((mysqli_num_rows($Resultado)>0)){
            return true;
        } else {
            return false;
        }
    }
    function GuardarProyecto($conexion, $USU_ID, $PRO_ID, $cargo, $jornada){
        $Registrador = $_SESSION['registrador'];
        $FechaActual = $_SESSION['fechaActual'];
        $Insert_UsPr = "insert into tbl_usuario_proyecto 
        (USU_ID,PRO_ID,USPR_CARGO,USPR_JORNADA,USPR_REGISTRADOR,USPR_FECHACREACION,USPR_ESTADO) values 
        ('{$USU_ID}','{$PRO_ID}','{$cargo}','{$jornada}','{$Registrador}','{$FechaActual}','activo')";
        $UsPrIngresado = mysqli_query($conexion, $Insert_UsPr);
        if ($UsPrIngresado) {
            echo '<script language="javascript">alert("Datos guardados correctamente!");window.location.href="../Vistas/CrearUsuario.php"</script>';
        } else {
            echo '<script language="javascript">alert("No se pudo ingresar los datos");window.location.href="../Vistas/CrearUsuario.php"</script>';
        }
    }


    function GuardarTodo($conexion, $cedula, $nomApe, $telf, $cargo, $jornada, $PRO_ID){
        //Guardar Usuario
        $Insert_Usuario = "insert into tbl_usuario 
        (USU_CEDULA,USU_NOMAPE,USU_TELF) values ('{$cedula}','{$nomApe}','{$telf}')";
        $UsuarioIngresado = mysqli_query($conexion, $Insert_Usuario);

        if ($UsuarioIngresado) {
            $USU_ID = ObtenerIdUsuario($conexion,$cedula);
            GuardarProyecto($conexion, $USU_ID, $PRO_ID, $cargo, $jornada);
        } else {
            echo '<script language="javascript">alert("No se pudo ingresar el usuario");window.location.href="../Vistas/CrearUsuario.php"</script>';
        }
    }
?>