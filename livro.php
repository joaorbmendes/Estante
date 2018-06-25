<!-- //////////////////////////////////////////////////////////////////////////////

    autor: João Mendes
    year: 2018
    contacto: joaorbmendes@gmail.com
    projecto: Estante | flag

////////////////////////////////////////////////////////////////////////////// -->
<?php 
session_start();

function __autoload($class_name) {
  require_once('classes/class.' . $class_name . '.php');
}


$livros = new Livros();
$sugestoes = new Livros();
$autores = new Autores();
$categorias = new Categorias();
//var_dump($_REQUEST);
/*
if(isset($_GET['autor'])) {
  $result = $livros->findAutor($_GET['autor']);
} else {
  $result = $livros->findAll();
}


*/

if(isset($_SESSION['nome'])) {
  $nome = $_SESSION['nome'];
}

if (isset($_GET['search'])) { 
  $like = '%' . $_GET['search'] . '%'; 
  
  $search = new Search();
  $select = array('imagem', 'titulo', 'nome', 'ano');
  //var_dump($search->selectSearch($select, $like));
}

?>
<!doctype html>
<html lang="pt">

<head>
  <!-- Required meta tags -->
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Estante | joaorbmendes</title>
  <meta name="description" content="Estante particular de livros">
  <meta name="keywords" content="Estante, Livros, Books">
  <meta name="author" content="joaorbmendes">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">

  <!-- Meu CSS -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
<?php 
require_once('modulos/menu.php'); 
require_once('modulos/login.php'); 
require_once('modulos/registar.php'); 
require_once('modulos/banner.php'); 
?>

  <main role="main">


<!-- /////////////////////////////////////////////////////////////////
                    LISTAGEM
/////////////////////////////////////////////////////////////////-->
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
          <?php

foreach($livros->selectLivro($_GET['livro']) as $livro) {
    $autorId = $livro->autor;
    $livroId = $livro->id;
?>


    <div class="col-md-3 col-sm-6 col-12 text-center">
            <img class="img-fluid" src="imagens/livros/<?php echo $livro->imagem; ?>.jpg" height="350" alt="">
            <br/> <br/>
            <p>
              <a class="btn btn-outline-success" href="#" role="button">Começar a ler</a>
            </p>
          </div>

          <div class="col-md-6 col-sm-6 col-12">
            <h3 class="texto"><?php echo utf8_encode($livro->titulo); ?></h3>
            <h6 class="texto cinza">de <?php echo utf8_encode($livro->nome); ?></h6>
            <p class="texto"><?php echo utf8_encode($livro->descricao); ?></p>

     
              <p class="text-center">
                <small><?php echo $livro->paginas; ?> páginas | <?php echo $livro->ano; ?> by <?php echo $livro->editora; ?></small>
              </p>

          </div>

    <div class="col-md-3 col-sm-6 col-12 text-center">
    <div class="row">
    <?php
        $where = array("autor"=>$autorId);
        $select = array("*");
foreach($livros->selectLivros($select, $where) as $livro) {
    if($livroId != $livro->id){
?>
         <div class="col-md-6 col-sm-6 col-6 text-center">
         <a href="livro.php?livro=<?php echo $livro->id; ?>"> <img class="img-fluid" src="imagens/livros/<?php echo $livro->imagem; ?>.jpg" height="350" alt="<?php echo $livro->titulo; ?>"></a>
            <br/> <br/>
            <p><a class="btn btn-outline-success" href="livro.php?livro=<?php echo $livro->id; ?>" role="button">Ver mais &raquo;</a></p>
          </div>
<?php 
}
} ?>


          </div>
          </div>
<?php
}

?>


      <hr>

    </div> <!-- /container -->

  </main>
</div> <!-- /container -->

<?php
require_once('modulos/footer.php');
?>


</body>

</html>
