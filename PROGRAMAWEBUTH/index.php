<!DOCTYPE html>
<html lang="en">

<head>
   <title>Programacion WEB</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>


   <div class="container mt-3"  >


      <h2>Formulario Ingreso Empleado</h2>

      <form action="empleado.php" method="POST">

         <div class="mb-3 mt-3">
            <label>Nombres</label>
            <input type="text" name="txtnombre" class="form-control" placeholder="Ingrese el nombre">
         </div>


         <div class="mb-3 mt-3">
            <label>Apellidos</label>
            <input type="text" name="txtapellido" class="form-control" placeholder="Ingrese el apellido">
         </div>

          <div class="mb-3 mt-3">
            <label>Direccion</label>
            <input type="text" name="txtdireccion" class="form-control" placeholder="Ingrese la direccion">
         </div>
          <div class="mb-3 mt-3">
            <label>Telefono</label>
            <input type="text" name="txttelefono" class="form-control" placeholder="Ingrese el telefono">
         </div>
          <div class="mb-3 mt-3">
            <label>Fecha</label>
            <input type="date" name="txtfecha" class="form-control" placeholder="Ingrese la fecha">
         </div>
         <input type="submit" name="Enviar" class="btn btn-primary">

      </form>

   </div>

</body>

</html>