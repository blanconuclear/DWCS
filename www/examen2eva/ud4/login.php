<?php
session_start();
if (isset($_POST["elixeLingua"])) {

   $idioma=$_POST['idioma'];

   setcookie('idioma',$idioma,time()+3000,'/');

}


?>
<!doctype html>
<head>
    <style type='text/css'>
        label
        {
                 display:inline-block;
                 width:8em;
        }
    </style>
</head>
<body>

<form action='login.php' method='post'>
    <label>Selecciona</label>
    <select name='idioma'>
        <option value='galego'>Galego</option>
        <option value='ingles'>Inglés</option>
    </select>
    <input type='submit' name='elixeLingua' value='Enviar lingua'>
</form>


<h3>Credenciais</h3>
<form action='validalogin.php' method='post'>
    <label>Usuario</label><input type='text' name='usuario'><br>
    <label>Contrasinal</label><input type='text' name='contrasinal'> 
    <input type='submit' name='enviaCredenciais' value='Enviar'>
</form>

</body>
</html>