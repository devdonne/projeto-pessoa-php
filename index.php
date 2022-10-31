<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina de pessoa</title>
</head>
<body>
  <form action="controlePessoa.php" method="post">
    <?php
      $mensagemDeErro = isset($_SESSION['mensagem-de-erro']) ? $_SESSION['mensagem-de-erro'] : '';
      if (!empty($mensagemDeErro)){
          echo '<p id="p1">'.$mensagemDeErro.'</p>';
      }
    ?>
    <p>CPF:<input type="text" name="cpf"></p>
    <p>Nome<input type="text" name="nome"></p>
    <p>Idade:<input type="text" name="idade"></p>
    <input type="submit" value="SALVAR" name="salvar">
    <input type="submit" value="ATUALIZAR" name="atualizar">
    <input type="submit" value="EXCLUIR" name="excluir">
    <input type="submit" value="LISTAR" name="listar">
  </form>
</body>
</html>