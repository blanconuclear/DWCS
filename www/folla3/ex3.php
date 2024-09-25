<?php
$salario = array(
  "Juan" => 2500,
  "María" => 3000,
  "Pedro" => 2200,
  "Luis" => 2800
);
$media = array_sum($salario) / count($salario);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <table border="1px" style="background-color: black; color: azure; font-size: 40px">
    <tr>
      <th>Alumno</th>
      <th>Sueldo</th>
    </tr>

    <?php foreach ($salario as $nombre => $sueldo): ?>
      <tr>
        <td><?= $nombre ?></td>
        <td><?= $sueldo ?></td>
      </tr>
    <?php endforeach; ?>

    <tr>
      <td style="background-color: gray">Media</td>
      <td><?= $media ?></td>
    </tr>
  </table>
</body>

</html>