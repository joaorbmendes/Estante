<?php
session_start();
function __autoload($class_name) {
    require_once('classes/class.' . $class_name . '.php');
  }

 session_unset(); 
//var_dump($_REQUEST);

if($_POST['Form'] == "Login") {

  /**
   * Login
   */

  $user = new Users();
  $valid = new Validar();
  $select = array('id', 'nome', 'email', 'genero');
  $where = $valid->validarLogin();
  //var_dump($where);
  //$user->selectUser($select, $where);
  //var_dump($user->selectUser($select, $where));
if(!isset($where['erro'])) {
  if(count($user->selectUser($select, $where))){
    session_unset(); 
    echo "login com sucesso";
    foreach($user->selectUser($select, $where) as $utilizador){
      $idUtilizador =  $utilizador->id;
      $nomeUtilizador =  $utilizador->nome;
      $emailUtilizador =  $utilizador->email;
      $generoUtilizador = $utilizador->genero;
    
    }
    $_SESSION["id"] = $idUtilizador;
    $_SESSION["nome"] = $nomeUtilizador;
    $_SESSION["email"] = $emailUtilizador;
    $_SESSION['genero'] = $generoUtilizador;

 } else {
  $_SESSION['ErroLogin'] = time()+3;
  $_SESSION['mensagem'] = "Login errado";

 }
 header('Location: index.php');
} else {
  $_SESSION['ErroLogin'] = time()+3;
  if(isset($where['emailErro'])) {
    $_SESSION['emailErro'] = $where['emailErro'];
  }
  if(isset($where['passwordErro'])) {
    $_SESSION['passwordErro'] = $where['passwordErro'];
  }
  header('Location: index.php');
}
} else {


  /**
   * Inserir Registo
   */
  $user = new Users();
  $valid = new Validar();
  $select = array('email', 'password');
  $insert = $valid->validarRegisto();
  //var_dump($insert);

  /**
   * Guardar os valores dos campos nome, email e data de nascimento do formulario em sessao 
   */
  if(isset($_POST['nome'])) {
    $_SESSION['nomeForm'] = $_POST['nome'];
  }
  if(isset($_POST['email'])) {
    $_SESSION['emailForm'] = $_POST['email'];
  }
  if(isset($_POST['data-nascimento'])) {
    $_SESSION['dataNascimentoForm'] = $_POST['data-nascimento'];
  }
  


  if(isset($insert['erro'])) {
    $_SESSION['ErroRegisto'] = time()+3;
    if(isset($insert['nomeErro'])) {
      $_SESSION['nomeErroRegisto'] = $insert['nomeErro'];
    }
    if(isset($insert['emailErro'])) {
      $_SESSION['emailErroRegisto'] = $insert['emailErro'];
    }
    if(isset($insert['dataNascimentoErro'])) {
      $_SESSION['dataNascimentoErroRegisto'] = $insert['dataNascimentoErro'];
    }
    if(isset($insert['generoErro'])) {
      $_SESSION['generoErroRegisto'] = $insert['generoErro'];
    }
    if(isset($insert['passwordErro'])) {
      $_SESSION['passwordErroRegisto'] = $insert['passwordErro'];
    }
    header('Location: index.php');
  } else {
    $email = $_POST['email'];
    $where = $valid->validarEmail($email);
  
    $user->selectUser($select, $where);
    //var_dump($where);
    //var_dump($user->selectUser($select, $where));
  
  
      foreach($user->selectUser($select, $where) as $utilizador){
        $emailUtilizador =  $utilizador->email;
        $passwordUtilizador = $utilizador->password;
        }
  
      if(isset($emailUtilizador) != $_POST['email']) {
        $user->insertUser($insert);
        $_SESSION['ErroRegisto'] = time()+3;
        $_SESSION['mensagem'] = "<span style='color: green'>Registado com sucesso!</span>";

  } else {
    $_SESSION['ErroRegisto'] = time()+3;
    $_SESSION['mensagem'] = "<span style='color: red'>O email já existe</span>";
  }

  header('Location: index.php');
  }
}
/*
echo "<br>id = " . $_SESSION["id"];
echo "<br>nome = " . $_SESSION["nome"];
echo "<br>email = " . $_SESSION["email"];
echo "<br>genero = " . $_SESSION['genero'];


*/
$_POST = array();





  