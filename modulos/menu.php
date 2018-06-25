 
<div class="logo"><img src="imagens/estante.svg" height="70px" alt=""/></div>
<div class="container">
  <nav class="navbar navbar-expand-md">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      MENU
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="btn-menu" href="/estante">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="btn-menu dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Autores</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
          <?php
            foreach ($autores->selectAutores() as $autor) {
          ?>
         <a class="dropdown-item" href="index.php?autor=<?php echo $autor->id; ?>"><?php echo utf8_encode($autor->nome); ?></a>
        <?php } ?>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="btn-menu dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
          <?php
  foreach ($categorias->selectCategorias() as $categoria) {
    $whereId = $categoria->id;
    $count = 0;
?>
 <a class="dropdown-item" href="index.php?categoria=<?php echo $categoria->id; ?>"><?php echo utf8_encode($categoria->categoria); ?> (<?php 
    foreach ($categorias->selectCategoria($whereId) as $total) {
      $count++;
      }
      echo $count; 
 ?>)</a>
  <?php } ?>
          </div>
        </li>
    <?php if(isset($_SESSION['nome'])) { ?>
      <li class="nav-item dropdown">
          <a class="btn-menu dropdown-toggle btn-menu-activo" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo utf8_encode($nome); ?></a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Conta</a>
          <a class="dropdown-item" href="#">Leituras</a>
          <a class="dropdown-item" href="#">Favoritos</a>
        <a class="dropdown-item" href="logout.php">Sair</a>
        
          </div>
        </li>
    <?php } else { ?>
      <a class="btn-menu" id="Entrar" href="#" data-toggle="modal" data-target="#loginModal">Entrar</a>
    <?php } ?>

      </ul>
      <form class="form-inline my-2 my-lg-0" action="index.php" method="get">
        <input class="form-control mr-sm-2" type="text" placeholder="Procurar" aria-label="Search" name="search" <?php if (isset($_POST['search'])) echo "value='" . $_POST['search'] . "?search=true'"; ?> >
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
      </form>
    </div>
  </nav>
