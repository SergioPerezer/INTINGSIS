<?php
include("connection.php");
$con = connection();

$sql = "SELECT * FROM users";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet">
    <title>Usuarios CRUD</title>
</head>

<body>
    <header class="header">
        <div class="users-form">
            <h3>
                <img src="ASSETS_php/IngenieriaDsis.png">
            </h3>
            <form action="insert_user.php" method="POST">
                <input type="text" name="name" placeholder="Nombre">
                <input type="text" name="lastname" placeholder="Apellidos">
                <input type="text" name="username" placeholder="Usuario">
                <input type="password" name="password" placeholder="Contraseña">
                <input type="email" name="email" placeholder="Gmail">

                <input type="submit" value="Agregar">
            </form>
        </div>
    </header>

    <div class="users-table">
        <h2>Usuarios registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Gmail</th>
                    <th>(Editar Cuenta)</th>
                    <th>(Eliminar Cuenta)</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['id'] ?></th>
                        <th><?= $row['name'] ?></th>
                        <th><?= $row['lastname'] ?></th>
                        <th><?= $row['username'] ?></th>
                        <th><?= $row['password'] ?></th>
                        <th><?= $row['email'] ?></th>
                        <th><a href="update.php?id=<?= $row['id'] ?>" class="users-table--edit">Editar</a></th>
                        <th><a href="delete_user.php?id=<?= $row['id'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>