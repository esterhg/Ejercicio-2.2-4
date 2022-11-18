<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Update a Record - PHP CRUD Tutorial</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
</head>
<body>
 
    <!-- container -->
    <div class="container">
 
        <div class="page-header">
            <h1>Update Product</h1>
        </div>
 
        <!-- PHP read record by ID will be here -->
                <?php
        // get passed parameter value, in this case, the record ID
        // isset() is a PHP function used to verify if a value is there or not
        $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
         
        //include database connection
        include_once 'database.php';
        $database = new database();
        $con = $database->getConnection();
         
        // read current record's data
        try {
            // prepare select query
             $sqlQuery ="SELECT id,nombres,apellidos, direccion,telefono,fechanac FROM empleados WHERE id = ? LIMIT 0,1";
             $stmt =$con->prepare($sqlQuery);
             
         
            // this is the first question mark
            $stmt->bindParam(1, $id);
         
            // execute our query
            $stmt->execute();
         
            // store retrieved row to a variable
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
         
            // values to fill up our form
             
               $nombres = $row['nombres'];
               $apellidos = $row['apellidos'];
               $direccion = $row['direccion'];
               $telefono = $row['telefono'];
               $fechanac = $row['fechanac'];
        }
         
        // show error
        catch(PDOException $exception){
            die('ERROR: ' . $exception->getMessage());
        }
        ?>
   <?php
             
            // check if form was submitted
            if($_POST){
             
                try{
             
                    // write update query
                    // in this case, it seemed like we have so many fields to pass and
                    // it is better to label them and not use question marks
                    include_once 'database.php';
                    $database = new database();
                    $con = $database->getConnection();
                    $sqlQuery ="UPDATE empleados SET nombres=:nombres,apellidos=:apellidos,direccion=:direccion,telefono=:telefono,fechanac=:fechanac WHERE id=:id";
                    $stmt =$con->prepare($sqlQuery);
             
                    // posted values
                    $nombres=htmlspecialchars(strip_tags($_POST['nombres']));
                    $apellidos=htmlspecialchars(strip_tags($_POST['apellidos']));
                    $direccion=htmlspecialchars(strip_tags($_POST['direccion']));
                    $telefono=htmlspecialchars(strip_tags($_POST['telefono']));
                    $fechanac=htmlspecialchars(strip_tags($_POST['fechanac']));
             
                    // bind the parameters
                    
                    $stmt->bindParam(':nombres', $nombres);
                    $stmt->bindParam(':apellidos', $apellidos);
                    $stmt->bindParam(':direccion', $direccion);
                    $stmt->bindParam(':telefono', $telefono);
                    $stmt->bindParam(':fechanac', $fechanac);
                    $stmt->bindParam(':id', $id);
             
                    // Execute the query
                    if($stmt->execute()){
                        echo "<div class='alert alert-success'>Record was updated.</div>";
                    }else{
                        echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
                    }
             
                }
             
                // show errors
                catch(PDOException $exception){
                    die('ERROR: ' . $exception->getMessage());
                }
            }
        ?>
        <!-- HTML form to update record will be here -->
        <!--we have our html form here where new record information can be updated-->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>ID</td>
                    <td><input type='text' name='id' value="<?php echo htmlspecialchars($id, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Nombres</td>
                    <td><input type='text' name='nombres' value="<?php echo htmlspecialchars($nombres, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Apellidos</td>
                    <td><input type='text' name='apellidos' value="<?php echo htmlspecialchars($apellidos, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>
                 <tr>
                    <td>Direccion</td>
                    <td><input type='text' name='direccion' value="<?php echo htmlspecialchars($direccion, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>
                 <tr>
                    <td>Telefono</td>
                    <td><input type='text' name='telefono' value="<?php echo htmlspecialchars($telefono, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>
                 <tr>
                    <td>Fecha nacimiento</td>
                    <td><input type='text' name='fechanac' value="<?php echo htmlspecialchars($fechanac, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save Changes' class='btn btn-primary' />
                        <a href='listaempleados.php' class='btn btn-danger'>Back to read products</a>
                    </td>
                </tr>
            </table>
        </form>
 
    </div> <!-- end .container -->
 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>