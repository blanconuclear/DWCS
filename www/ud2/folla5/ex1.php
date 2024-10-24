    <?php

    $elementos = array(
        "alcalinos" => array(
            "Li" => 3,
            "Na" => 11,
            "K" => 19,
            "Rb" => 37,
            "Cs" => 55,
            "Fr" => 87
        ),
        "alcalino-terreos" => array(
            "Be" => 4,
            "Mg" => 12,
            "Ca" => 20,
            "Sr" => 38,
            "Ba" => 56,
            "Ra" => 88
        ),
        "terreos" => array(
            "B" => 5,
            "Al" => 13,
            "Ga" => 31,
            "In" => 49,
            "Tl" => 81
        )
    );

    //Contar los elementos de cada grupo.
    $numeroTotal = count($elementos[$_GET['grupo']]);

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <style>
            body {
                background-color: blue;
                color: white;
                text-align: center;
                height: 100%;
            }

            table {
                width: 50%;
                border-collapse: collapse;
                margin: 50px auto;
            }

            th,
            td {
                padding: 10px;
                border: 1px solid #ccc;
                text-align: left;
                text-align: center;
            }

            th {
                background-color: #333;
                color: #fff;
            }

            a {
                text-decoration: none;
                padding: 20px;
                margin-top: 200px;
            }
        </style>
    </head>

    <body>
        <h1>Táboa Periódica dos Elementos</h1>


        <?= "O grupo " . $_GET['grupo'] . " está formado polos seguintes elementos: " ?>

        <table>
            <tr>
                <th>Nombre</th>
                <th>Nº atómico</th>
            </tr>

            <?php
            if (isset($_GET['grupo'])) {
                foreach ($elementos[$_GET['grupo']] as $nombre => $atomico) {
                    echo "<tr>";
                    echo "<td>" . $nombre . "</td>";
                    echo "<td>" . $atomico . "</td>";
                    echo "</tr>";
                }
            }
            ?>

        </table>
        <?= "Número total: $numeroTotal" ?>
        <br>
        <button> <a href="javascript:history.back()">Volver atrás</a></button>
    </body>

    </html>