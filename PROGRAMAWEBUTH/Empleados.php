<?php


class Empleados
{

	//Coneexion 

	private $conn;
	private $tablename = "empleados";

	public $id;
	public $nombres;
	public $apellidos;
	public $direccion;
	public $telefono;
	public $fechanac;

    // Construuctor de Clase
    
    public function __construct($db)
    {
    	$this->conn = $db;
    }

    // Crear un empleados
        public function createEmployee(){
            $sqlQuery = "INSERT INTO
                        ". $this->tablename ."
                    SET
                    nombres = :nombres, 
                    apellidos = :apellidos, 
                    direccion = :direccion, 
                    telefono = :telefono, 
                    fechanac = :fechanac";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->nombres=htmlspecialchars(strip_tags($this->nombres));
            $this->apellidos=htmlspecialchars(strip_tags($this->apellidos));
            $this->direccion=htmlspecialchars(strip_tags($this->direccion));
            $this->telefono=htmlspecialchars(strip_tags($this->telefono));
            $this->fechanac=htmlspecialchars(strip_tags($this->fechanac));
          
        
            // bind data
            $stmt->bindParam(":nombres", $this->nombres);
            $stmt->bindParam(":apellidos", $this->apellidos);
            $stmt->bindParam(":direccion", $this->direccion);
            $stmt->bindParam(":telefono", $this->telefono);
            $stmt->bindParam(":fechanac", $this->fechanac);
           
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        public function getEmpleados(){
            $sqlQuery="SELECT id, nombres, apellidos, direccion, telefono,fechanac FROM  ". $this->tablename ."";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt -> execute();
            return $stmt;
        }



}

?>