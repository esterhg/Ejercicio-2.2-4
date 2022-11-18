<?php
  include_once 'database.php';
  include_once 'Empleados.php';
   $database = new database();
   $db = $database->getConnection();
   $item = new Empleados($db);  

   if(isset($_POST['txtnombre'])&&isset($_POST['txtapellido'])&&isset($_POST['txtdireccion'])&&isset($_POST['txttelefono'])&&isset($_POST['txtfecha']))
   {
   	  $nombre = $_POST['txtnombre'];
   	  $apellidos = $_POST['txtapellido'];
   	  $direccion = $_POST['txtdireccion'];
   	  $telefono = $_POST['txttelefono'];
   	  $fechanac = $_POST['txtfecha'];

   	   $item->nombres = $nombre;
   	   $item->apellidos = $apellidos;
   	   $item->direccion = $direccion;
   	   $item->telefono  = $telefono;
   	   $item->fechanac = $fechanac;
   	   if($item->createEmployee()){
   	   	 	header('Location: listaempleados.php');
   	   }
   	   else{
   	   		echo "Empleado no creado";
   	   }
   }
?>