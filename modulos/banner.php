
<!-- /////////////////////////////////////////////////////////////////
                    BANNER
/////////////////////////////////////////////////////////////////-->
<?php if(isset($_GET['livro']) OR isset($_GET['categoria']) OR isset($_GET['autor'])) {  ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron banner_baixo" id="banner">
      <div class="container">
      
      </div>
    </div>
    <?php } else { ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" id="banner">
      <div class="container">
        <h1 class="display-3" id="banner_destaque">Fantasia</h1>
        <p><a class="btn btn-primary btn-lg" href="index.php?categoria=3" role="button">Ver mais &raquo;</a></p>
      </div>
    </div>
    <?php }?>