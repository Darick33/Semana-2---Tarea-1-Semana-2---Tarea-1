<?php
//TODO: Clase de Productos
require_once('../config/config.php');

class Productos
{

    public function todos() 
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();

        $cadena = "SELECT * FROM `Productos`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idProductos) 
    {
        $con = new ClaseConectar();

        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `Productos` WHERE `idProductos`=$idProductos";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        
        return $datos;

    }

    public function insertar($Codigo_Barras, $Nombre_Producto, $Graba_IVA)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `Productos` (`Codigo_Barras`, `Nombre_Producto`, `Graba_IVA`) VALUES ('$Codigo_Barras','$Nombre_Producto','$Graba_IVA')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function actualizar($idProductos, $Codigo_Barras, $Nombre_Producto, $Graba_IVA)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `Productos` SET `Codigo_Barras`='$Codigo_Barras', `Nombre_Producto`='$Nombre_Producto', `Graba_IVA`='$Graba_IVA' WHERE `idProductos` = $idProductos";
            if (mysqli_query($con, $cadena)) {
                return $idProductos;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($idProductos) //delete from productos where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `Productos` WHERE `idProductos`= $idProductos";
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}












?>
