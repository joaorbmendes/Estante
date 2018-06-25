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

$where = array("1"=>"1");
$select = array("id", "titulo", "nome", "ano", "imagem");
$livros = new Livros();
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
  $select = array('id', 'imagem', 'titulo', 'nome', 'ano');
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
              if (isset($_GET['autor'])) {
                $where = array("autor"=>$_GET['autor']);
                $select = array("id", "titulo", "nome", "ano", "imagem");
                foreach($livros->selectLivros($select, $where) as $livro) { 
                  ?>
                                <div class="col-md-2 col-sm-3 col-6">
      <a href="livro.php?livro=<?php echo $livro->id; ?>"><img src="imagens/livros/<?php echo $livro->imagem; ?>.jpg" class="img-thumbnail" alt="<?php echo utf8_encode($livro->titulo); ?>"></a>
              <!--<h5 class="text-center"><?php echo utf8_encode($livro->titulo); ?></h5> -->
              <p class="descricao text-center"><?php echo utf8_encode($livro->nome); ?></p>
              <p class="ano text-center"><?php echo utf8_encode($livro->ano); ?></p>
              <p><a class="btn btn-outline-success" href="#" role="button">Ver mais &raquo;</a></p>
              <br/><br/>
            </div>
    <?php
                  }
               
              } else if (isset($_GET['categoria'])) {
                      $where = $_GET['categoria'];
                      foreach($categorias->selectCategoria($where) as $categoria) { 
                        foreach($livros->selectLivro($categoria->id_livro) as $livro) {
                        ?>
                                      <div class="col-md-2 col-sm-3 col-6">
            <a href="livro.php?livro=<?php echo $livro->id; ?>"><img src="imagens/livros/<?php echo $livro->imagem; ?>.jpg" class="img-thumbnail" alt="<?php echo utf8_encode($livro->titulo); ?>"></a>
                    <!--<h5 class="text-center"><?php echo utf8_encode($livro->titulo); ?></h5> -->
                    <p class="descricao text-center"><?php echo utf8_encode($livro->nome); ?></p>
                    <p class="ano text-center"><?php echo utf8_encode($livro->ano); ?></p>
                    <p><a class="btn btn-outline-success" href="#" role="button">Ver mais &raquo;</a></p>
                    <br/><br/>
                  </div>
          <?php
                        }
                      } 
                    } else if (isset($_GET['search'])) {
            foreach($search->selectSearch($select, $like) as $resultadoSearch) {  ?>
                            <div class="col-md-2 col-sm-3 col-6">
  <a href="livro.php?livro=<?php echo $resultadoSearch->id; ?>"><img src="imagens/livros/<?php echo $resultadoSearch->imagem; ?>.jpg" class="img-thumbnail" alt="<?php echo utf8_encode($resultadoSearch->titulo); ?>"></a>
          <!--<h5 class="text-center"><?php echo utf8_encode($resultadoSearch->titulo); ?></h5> -->
          <p class="descricao text-center"><?php echo utf8_encode($resultadoSearch->nome); ?></p>
          <p class="ano text-center"><?php echo utf8_encode($resultadoSearch->ano); ?></p>
          <p><a class="btn btn-outline-success" href="#" role="button">Ver mais &raquo;</a></p>
          <br/><br/>
        </div>
<?php
            } 
          } else {
foreach($livros->selectLivros($select, $where) as $livro) {
?>

                <div class="col-md-2 col-sm-3 col-6">
                <a href="livro.php?livro=<?php echo $livro->id; ?>"><img src="imagens/livros/<?php echo $livro->imagem; ?>.jpg" class="img-thumbnail" alt="<?php echo utf8_encode($livro->titulo); ?>"></a>
          <!--<h5 class="text-center"><?php echo utf8_encode($livro->titulo); ?></h5> -->
          <p class="descricao text-center"><?php echo utf8_encode($livro->nome); ?></p>
          <p class="ano text-center"><?php echo utf8_encode($livro->ano); ?></p>
          <p><a class="btn btn-outline-success" href="livro.php?livro=<?php echo $livro->id; ?>" role="button">Ver mais &raquo;</a></p>
          <br/><br/>
        </div>
 
<?php
}
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
