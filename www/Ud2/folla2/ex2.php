<?php

if ($_POST['idade'] < 18) {
    echo "Hola menor de idade {$_POST['nome']}";
} elseif ($_POST['idade'] < 65) {
    echo "Hola idade traballar {$_POST['nome']}";
} else {
    echo "Hola xubilado {$_POST['nome']}";
}
