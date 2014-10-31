<?php


class Usuario {

private $name;

    //funcion que obtiene el nombre asignado
    public function getUsuario(){
        echo "<br><b>Mostrar Usuario:</b> ".$this->name;

    }
    //funcion que asigna un nombre
    public function setUsuario(){
        $this->name = "Jhovanny";
        return $this->name;
    }
    public function ConsultarDatos()
    {
        $sql01="SELECT * FROM personascontrol WHERE estatus = 1 ORDER BY IdPersona ASC";
        $consulta = mysql_query($sql01) or die ("error 1");
        echo "<div class=table-responsive>";
        echo "<table class=\"table table-striped\">";
        echo "<tr><td colspan=5 align=center><b>Resultados</b></td></tr>";
        echo"<tr><td><b>Clave</b></td><td><b>Nombre</b></td><td><b>Apellido Paterno</b></td><td><b>Apellido Materno</b></td><td><b>Tipo</b></td>";
        while($field = mysql_fetch_array($consulta)){
            $this->IdPersona = $field['IdPersona'];
            $this->Nombre = $field['nombre'];
            $this->ApellidoPaterno = $field['Apat'];
            $this->ApellidoMaterno = $field['Amat'];
            $this->Nivel = $field['nivel'];
            switch($this->Nivel){
                case 1:
                    $type = "Administrador";
                    break;
                case 2:
                    $type = "Maestro";
                    break;
                case 3:
                    $type = "Alumno";
                    break;
            }
            echo "<tr><td>$this->IdPersona</td><td>$this->Nombre</td><td>$this->ApellidoPaterno</td><td>$this->ApellidoMaterno</td><td>$type</td></tr>";
        }
        echo "</table>";
        echo "</div>";
    }



} 