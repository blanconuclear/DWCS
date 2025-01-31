  <?php
  require_once "conexion.php";



  if (isset($_POST['btn_gardar'])) {
    $nome = htmlspecialchars($_POST['nome']);
    $comentario = htmlspecialchars($_POST['comentario']);

    $sql = "INSERT INTO comentarios(nome, comentario) 
            VALUES (:nome,:comentario)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ':nome' => $nome,
      ':comentario' => $comentario
    ]);
  }

  ?>

  <!DOCTYPE html>
  <html lang="gl">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario de Comentarios</title>
  </head>

  <body>
    <h1>Formulario de Comentarios</h1>
    <form method="post">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required /><br /><br />

      <label for="comentario">Comentario:</label>
      <textarea
        id="comentario"
        name="comentario"
        rows="4"
        cols="50"
        required
        maxlength="300"></textarea><br /><br />

      <button name="btn_gardar">Gardar</button>
    </form>

    <a href="mostra.php">Mostrar resultados</a>
  </body>

  </html>