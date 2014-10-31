<?php
require ('bd/bd.php');
class Valida{
    private $User;
    private $Password;

    public function ValidaUser($User,$Password){
        $user=  $User;
        $psw=   $Password;
        if ($user==""or $psw=="")
        {
            $msg="Los campos deben ir llenos";
            print "<meta http-equiv='refresh' content='0; url=loguin.php?msg=$msg'>";
            exit;
        }
        $sql="SELECT * FROM usuarios WHERE matricula='$user' AND password='$psw'";
        $consulta=mysql_query($sql)or die ("error de consulta de usuario y contrasena");
        $cuantos=mysql_num_rows($consulta);
        if($cuantos==0)
        {
            $msg='Usuario o contrasena invalidos';
            print "<meta http-equiv='refresh' content='0; url=loguin.php?msg=$msg'>";
            exit;
        }
        else
        {
            $idu=mysql_result($consulta,0,'matricula');
            $activo=mysql_result($consulta,0,'estatus');
            if($activo== 0 )
            {
                $msg='usuario inactivo, consulte a su administrador';
                print "<meta http-equiv='refresh' content='0; url=loguin.php?msg=$msg'>";
                exit;
            }
            else
            {
                $ide     =  ("$idu");
                $acceso = new Valida();
                $acceso->Acceso($ide);
            }
        }
    }
    public function Acceso($ide){
        $idu=$ide;
        session_start();
        $_SESSION['idu']=$idu;
        $_SESSION['acceso']=1;
        SetCookie('idu2',$idu);
        SetCookie('acceso2',1);
        $conexion=mysql_connect('localhost', 'root', '') or die ('no se pudo conectar al hosting');
        $base=mysql_select_db('proyecto', $conexion) or die('no existe base de datos');
        print "<meta http-equiv='refresh' content='0; url=index.php'>";
        exit;
    }
}
?>