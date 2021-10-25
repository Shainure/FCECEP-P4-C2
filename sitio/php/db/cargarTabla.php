<?php


class cargarDatos
{
    # VARIABLES PREDEFINIDAS
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;

    # Dinamicas
    private $listado = array();


    #Método constructor
    public function __construct()
    {
        $this->db_host = "localhost";
        $this->db_user = "root";
        $this->db_pass = "";
        $this->db_name = "ciudsanos";
    }

    public function cargar()
    {
        $conexion = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        $sql = "SELECT con.idConsulta,  con.cedula, con.fechConsulta, con.detalles, con.medico, pac.nombre
                FROM consultas as con INNER JOIN pacientes as pac
                ON con.cedula = pac.cedula ORDER BY idConsulta;";

        $resultado = $conexion->query($sql)
            or die(mysqli_errno($this->conexion) . " : "
                . mysqli_error($conexion) . " | Query=" . $sql);


        //$primerRegistro = $resultado->fetch_assoc();

        //print_r($primerRegistro);

        $listado = array();
        while ($fila = $resultado->fetch_assoc()) {
            $listado[] = $fila;
        }

        //print_r($listado);
        $this->setListado($listado);

        $conexion->close();
    }

        public function getListado()
        {
            return $this->listado;
        }
    
        private function setListado($listado)
        {
            $this->listado = $listado;
        }
}

?>