<!DOCTYPE html>
<html lang="gl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcións de Tratamento de Cadeas en PHP</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h1>Funcións de Tratamento de Cadeas de Caracteres en PHP</h1>
    <table>
        <thead>
            <tr>
                <th>Nome da función</th>
                <th>Explicación</th>
                <th>Exemplo</th>
                <th>Saída</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Cadea de exemplo
            $cadena1 = "Hoxe estamos nun 'día de outono' chove, chove!!";
            $cadena2 = "PHP é unha linguaxe de programación. PHP é potente.";

            // Funcións e resultados
            $funciones = [
                [
                    'nome' => 'strlen()',
                    'explicacion' => 'Devolve o número de caracteres da cadea',
                    'exemplo' => "strlen(\"$cadena1\")",
                    'saida' => strlen($cadena1) . ' caracteres'
                ],
                [
                    'nome' => 'substr()',
                    'explicacion' => 'Obtén unha subcadea a partir dun índice específico',
                    'exemplo' => "substr(\"$cadena1\", 5, 6)",
                    'saida' => substr($cadena1, 5, 6)
                ],
                [
                    'nome' => 'strstr()',
                    'explicacion' => 'Busca a primeira aparición dunha subcadea e devolve a parte da cadea desde esa posición',
                    'exemplo' => "strstr(\"$cadena1\", \"día\")",
                    'saida' => strstr($cadena1, "día")
                ],
                [
                    'nome' => 'strchr()',
                    'explicacion' => 'É un sinónimo de strstr()',
                    'exemplo' => "strchr(\"$cadena1\", \"de\")",
                    'saida' => strchr($cadena1, "de")
                ],
                [
                    'nome' => 'strrchr()',
                    'explicacion' => 'Busca a última aparición dunha subcadea e devolve a parte da cadea desde esa posición',
                    'exemplo' => "strrchr(\"$cadena1\", \"chove\")",
                    'saida' => strrchr($cadena1, "chove")
                ],
                [
                    'nome' => 'strpos()',
                    'explicacion' => 'Busca a posición da primeira aparición dunha subcadea',
                    'exemplo' => "strpos(\"$cadena1\", \"outono\")",
                    'saida' => strpos($cadena1, "outono")
                ],
                [
                    'nome' => 'str_replace()',
                    'explicacion' => 'Substitúe todas as ocorrencias dunha subcadea por outra',
                    'exemplo' => "str_replace(\"chove\", \"neva\", \"$cadena1\")",
                    'saida' => str_replace("chove", "neva", $cadena1)
                ],
                [
                    'nome' => 'trim()',
                    'explicacion' => 'Elimina espazos en branco ao principio e ao final da cadea',
                    'exemplo' => "trim(\"   Este texto ten espazos ao redor   \")",
                    'saida' => trim("   Este texto ten espazos ao redor   ")
                ],
                [
                    'nome' => 'ucfirst()',
                    'explicacion' => 'Convierte a primeira letra da cadea a maiúscula',
                    'exemplo' => "ucfirst(\"$cadena1\")",
                    'saida' => ucfirst($cadena1)
                ],
                [
                    'nome' => 'strcmp()',
                    'explicacion' => 'Compara dúas cadeas. Devolve 0 se son iguais, menor que 0 se a primeira é menor, maior que 0 se a primeira é maior.',
                    'exemplo' => "strcmp(\"PHP\", \"Python\")",
                    'saida' => strcmp("PHP", "Python")
                ],
                [
                    'nome' => 'urlencode()',
                    'explicacion' => 'Convierte caracteres especiais en cadeas de texto a un formato seguro para URLs',
                    'exemplo' => "urlencode(\"$cadena1\")",
                    'saida' => urlencode($cadena1)
                ],
                [
                    'nome' => 'urldecode()',
                    'explicacion' => 'Convierte cadeas de texto codificadas en URL de volta ao seu formato orixinal',
                    'exemplo' => "urldecode(\"" . urlencode($cadena1) . "\")",
                    'saida' => urldecode(urlencode($cadena1))
                ],
                [
                    'nome' => 'mb_strlen()',
                    'explicacion' => 'Devolve o número de caracteres da cadea, considerando os caracteres multibait',
                    'exemplo' => "mb_strlen(\"$cadena2\")",
                    'saida' => mb_strlen($cadena2) . ' caracteres'
                ],
            ];

            // Mostrar as funcións na táboa
            foreach ($funciones as $funcion) {
                echo "<tr>
                    <td>{$funcion['nome']}</td>
                    <td>{$funcion['explicacion']}</td>
                    <td>{$funcion['exemplo']}</td>
                    <td>{$funcion['saida']}</td>
                  </tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>