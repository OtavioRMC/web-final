<?php
  
  // Parâmetros da conexão
  $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $banco = "db_cardapio";

  $conn = new mysqli($servidor, $usuario,$senha , $banco);

  if($conn->connect_error){
    die("Falha na Conexão: "  . $conn->connect_error);
  }
  else {
    echo "";
  }


?>