<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: gray;
        }

        .par {
            background-color: black;
            color: yellow;
        }
    </style>
</head>

<body>
    <table border="1px">
        <tr>
            <th>Día</th>
            <th>Saúdo</th>
        </tr>
        <?php
        $n = 1;
        $saudoDia = "Bós días";
        $saudoTarde = "Boas tardes";
        for ($i = 0; $i <= 99; $i++) {
            // Apply the "par" class to even-numbered rows
            if ($i % 2 == 0) {
                echo "<tr class='par'>";
            } else {
                echo "<tr>";
            }

            echo "<td>" . $n . "</td>";
            $n += 1;

            if ($i % 2 != 0) {
                echo "<td>" . $saudoTarde . "</td>";
            } else {
                echo "<td>" . $saudoDia . "</td>";
            }
            echo "</tr>";
        }
        ?>
</body>

</html>