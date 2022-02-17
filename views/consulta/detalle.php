<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div id="main">
        <h1 class="center">Detalle de <?php echo $this->personal->id_personal; ?> </h1>

        <div class="center"><?php echo $this->mensaje; ?></div>

        <form action="<?php echo constant('URL'); ?>consulta/actualizarPersonal" method="POST">

            <p>
                <label for="id_personal">ID</label><br>
                <input type="number" name="id_personal" disabled value="<?php echo $this->personal->id_personal; ?>" required>
            </p>
            <p>
                <label for="nombre">Nombre</label><br>
                <input type="text" name="nombre" value="<?php echo $this->personal->nombre; ?>" required>
            </p>
            <p>
                <label for="estatus">estatus</label><br>
                <input type="text" name="estatus" value="<?php echo $this->personal->estatus; ?>" required>
            </p>

            <p>
            <input type="submit" value="Actualizar personal">
            </p>

        </form>
    </div>

    <?php require 'views/footer.php'; ?>
</body>
</html>