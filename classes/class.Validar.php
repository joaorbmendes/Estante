<?php 

class Validar {


    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
     
      public function validarRegisto() {
        $dadosForm = []; 
        if(
            isset($_POST['nome']) && 
            isset($_POST['email']) && 
            isset($_POST['data-nascimento']) && 
            isset($_POST['genero']) && 
            isset($_POST['password1']) && 
            isset($_POST['password2'])) {
          
              if (empty($_POST["nome"])) {
                $nomeErro = "Nome é um campo obrigatório<br/>";
                $dadosForm['erro'] = 1;
                $dadosForm['nomeErro'] = $nomeErro; 
              } else {
                $nome = $this->test_input($_POST["nome"]);
                $dadosForm['nome'] = $nome;
              }
            
              if (empty($_POST["email"])) {
                $emailErro = "Email é um campo obrigatório<br/>";
                $dadosForm['erro'] = 1;
                $dadosForm['emailErro'] = $emailErro; 
              } else {
                $email = $this->test_input($_POST["email"]);
                $dadosForm['email'] = $email;
              }  
          
              if (empty($_POST["data-nascimento"])) {
                $dataNascimentoErro = "Data de nascimento é um campo obrigatório<br/>";
                $dadosForm['erro'] = 1;
                $dadosForm['dataNascimentoErro'] = $dataNascimentoErro; 
              } else {
                $dataNascimento = $this->test_input($_POST["data-nascimento"]);
                $dadosForm['data_nasc'] = $dataNascimento;
              }
            
              if (empty($_POST["genero"])) {
                $generoErro = "Genero é um campo obrigatório<br/>";
                $dadosForm['erro'] = 1;
                $dadosForm['generoErro'] = $generoErro; 
              } else {
                $genero = $this->test_input($_POST["genero"]);
                $dadosForm['genero'] = $genero;
              }
            
              if (empty($_POST["password1"]) || empty($_POST["password2"])) {
                $passwordErro = "Password é um campo obrigatório<br/>";
                $dadosForm['erro'] = 1;
                $dadosForm['passwordErro'] = $passwordErro; 
              } else {
                $password1 = $this->test_input($_POST["password1"]);
                $password2 = $this->test_input($_POST["password2"]);
                if($password1 === $password2) {
                  $dadosForm['password'] = $password1;
                } else {
                  $passwordErro = "Passwords não coincidem<br/>";
                  $dadosForm['erro'] = 1;
                  $dadosForm['passwordErro'] = $passwordErro; 
                }

              }
            }
            return $dadosForm;
      }
      public function validarLogin() {
        $dadosForm = [];
        if(
          isset($_POST['email']) && 
          isset($_POST['password'])) {

            if (empty($_POST["email"])) {
              $emailErro = "Email é um campo obrigatório<br/>";
              $dadosForm['erro'] = 1;
              $dadosForm['emailErro'] = $emailErro;
            } else {
              $email = $this->test_input($_POST["email"]);
              $dadosForm['email'] = $email;
            }  

            if (empty($_POST["password"])) {
              $passwordErro = "Password é um campo obrigatório<br/>";
              $dadosForm['erro'] = 1;
              $dadosForm['passwordErro'] = $passwordErro;
            } else {
              $password = $this->test_input($_POST["password"]);
              $dadosForm['password'] = $password;
            }
      }
        return $dadosForm;
   

    }

    public function validarEmail($email) {
      $dadosForm = [];
      $dadosForm['email'] = $this->test_input($email);
      return $dadosForm;
    }
}