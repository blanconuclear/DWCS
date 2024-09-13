<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border=1px>
<tr>   
<th>Número</th>
<th>Multiplicando</th>
<th>Resultado</th>
</tr>
<?php
$n=1;
for ($i=0; $i <= 10; $i++) { 


    echo "<tr>";
   echo "<td>"."7"."</td>";
   $n+=1;
   echo "<td>".$i."</td>";
   echo "<td>".$i* 7 ."</td>";
   echo "</tr>";

}
?>
    </table>
</body>
</html>