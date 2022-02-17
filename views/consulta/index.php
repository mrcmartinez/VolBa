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
        <h1 class="center">Sección de Consulta</h1>
        <div id="respuesta" class="center"></div>

        <table width="100%">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody id="tbody-personal">
                <?php
                    include_once 'models/personal.php';
                    foreach($this->personal as $row){
                        $personal = new Personal();
                        $personal = $row; 
                ?>
                <tr id="fila-<?php echo $personal->matricula; ?>">
                    <td><?php echo $personal->matricula; ?></td>
                    <td><?php echo $personal->nombre; ?></td>
                    <td><?php echo $personal->apellido; ?></td>
                    
                    <td><a href="<?php echo constant('URL') . 'consulta/verPersonal/' . $personal->matricula; ?>">Editar</a>  </td>
                    <!-- <td><a href="<?php echo constant('URL') . 'consulta/eliminarPersonal/' . $personal->matricula; ?>">Eliminar</a> </td>-->
                    <td><button class="bEliminar" data-matricula="<?php echo $personal->matricula; ?>">Eliminar</button></td>
                </tr>

                <?php } ?>
            </tbody>
        </table>
        
    </div>

    <?php require 'views/footer.php'; ?>

    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>

</body>
</html>