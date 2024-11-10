<?php

 include 'db.php';


 // Recebe as informaçãoes via formulário
 $nome = $_POST["nome"];
 $email = $_POST["email"];
 $data_nascimento = $_POST["data_nasc"];
 $telefone = $_POST["telefone"];
 $senha = $_POST["senha"];
 $hashed_password = password_hash($senha,PASSWORD_DEFAULT,['cost' => 12]);
 $cep = $_POST["cep"];
 $rua = $_POST["rua"];
 $num = $_POST["numero"];
 $bairro = $_POST["bairro"];
 $compl = $_POST["complemento"];
 $cidade = $_POST["cidade"];
 $estado = $_POST["estado"];

echo"antes da instrução";

 $sql = "INSERT INTO tb_usuario (nome, email, data_nascimento, telefone, senha, cep, rua, numero, bairro, complemento, cidade, estado) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
 $cmd = $conn->prepare($sql);

 
if ($cmd) {
  // Associar parâmetros a instrução sql.
  $cmd->bind_param("ssssssssssss", $nome, $email, $data_nascimento, $telefone, $hashed_password, $cep, $rua, $num, $bairro, $compl, $cidade, $estado);
  
  // Executa a query
  if ($cmd->execute()) {
      echo "Usuário cadastrado com sucesso!";
  } else {
      echo "Erro ao cadastrar usuário." . $cmd->error;
  }
} else {
  echo "Falha na preparação da consulta." .$conn->error;
}

// Fecha a comunicação com o banco.
$conn->close();

?>