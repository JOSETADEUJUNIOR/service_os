<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/usuario_dataview.php';

use Src\_public\Util;
?>

<!-- view para listar os usuários (listarUsuarios.php) -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista de Setores</title>
</head>

<body>
    <h1>Lista de Setores</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Setor Nome</th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registros as $usuario) : ?>
                <tr>
                    <td><?= $usuario['id'] ?></td>
                    <td><?= $usuario['nome'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>