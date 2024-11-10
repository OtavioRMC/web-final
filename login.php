<?php
// Implementação da Lógica de Login.
session_start();

require "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $email = mysqli_real_escape_string($conn,$_POST["email"]);
  $password = mysqli_real_escape_string($conn,$_POST["password"]);

  $query = "SELECT * FROM tb_usuario where email = '$email'";
  $result = mysqli_query($conn,$query);

  if(mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_assoc($result);

    if($password === $user["password"]) {
      $_SESSION["user_id"] = $user["id"];
      $_SESSION["user_email"] = $user["email"];
      echo json_encode(["status" => "sucess"]);
  
    } else
      echo json_encode(["status" => "error","message" => "Senha Incorreta!"]);
  } else
      echo json_encode(["status" => "error", "message" => "Usuário não encontrado!"]);

}

?>