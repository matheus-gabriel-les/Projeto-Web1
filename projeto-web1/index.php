<?php 
if(isset($_POST['Cadastrar'])){
  header("Location: CriarConta.html");
  exit();
}

if(isset($_POST['Logar'])){
  header("Location: PaginaLogin.html");
  exit();
}
?>
