
<?php
class Login
{
    private $loginID;
    private $loginPwd;

    # VARIABLES PREDEFINIDAS
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name ;

    # Dinamicas
    private $userName;
    private $ingreso;


    #Método constructor
    public function __construct($loginID, $loginPwd)
    {
        $this->loginID = $loginID;
        $this->loginPwd = $loginPwd;
        $this->userName = "";

       $this->db_host = "localhost";
       $this->db_user = "root";
       $this->db_pass = "";
       $this->db_name = "ciudsanos";

    }

    public function login()
    {
        $conexion = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        $sql = "select nombre, cedula, password from medicos WHERE cedula=" . $this->loginID . " && password='" . $this->loginPwd . "' ";

        $resultado = $conexion->query($sql)
            or die(mysqli_errno($this->conexion) . " : "
                . mysqli_error($conexion) . " | Query=" . $sql);

        $primerRegistro = $resultado->fetch_assoc();


        print_r($primerRegistro);


        if (mysqli_num_rows($resultado) == 0) {
            $this->setIngreso(0);
        } else {
            $this->setIngreso(1);
            $this->setUserName($primerRegistro['nombre']);
            
        }

        $conexion->close();
    }

    private function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getIngreso()
    {
        return $this->ingreso;
    }

    private function setIngreso($ingreso)
    {
        $this->ingreso = $ingreso;
    }
}
?>

