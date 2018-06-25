
<!-- /////////////////////////////////////////////////////////////////
                    REGISTAR
/////////////////////////////////////////////////////////////////-->

<!-- Modal -->
<div class="modal fade" id="registarModal" tabindex="-1" role="dialog" aria-labelledby="registarModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" width="800px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="validation.php" method="post">
      <div class="modal-body">
      <?php if(isset($_SESSION['mensagem']) && isset($_SESSION['ErroRegisto']) && $_SESSION['ErroRegisto'] > time()) echo "<p class='msgErro'>" . $_SESSION['mensagem'] . "<p>"; ?>
        <div class="row">
        
        <div class="col-md-6"> 
        <div class="form-group">
 
    <label for="nome" id="nomeLabel"><?php if(isset($_SESSION['nomeErroRegisto'])  && isset($_SESSION['ErroRegisto']) && $_SESSION['ErroRegisto'] > time()) echo "<span class='msgErro'>" . $_SESSION['nomeErroRegisto'] . "</span>"; else echo "Nome"; ?></label>
    <input type="text" class="form-control" id="nome" name="nome" aria-describedby="emailHelp" placeholder="Nome" <?php if(isset($_SESSION['nomeForm'])) echo "value='" . $_SESSION['nomeForm'] . "'"; ?>>
    
  </div>
  <div class="form-group">

    <label for="email" id="emailLabel"><?php if(isset($_SESSION['emailErroRegisto']) && isset($_SESSION['ErroRegisto']) && $_SESSION['ErroRegisto'] > time()) echo "<span class='msgErro'>" . $_SESSION['emailErroRegisto'] . "</span>"; else echo "Email"; ?></label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Inserir Email" <?php if(isset($_SESSION['emailForm'])) echo "value='" . $_SESSION['emailForm'] . "'"; ?>>
    
  </div>
  <div class="form-group">
 
    <label for="data-nascimento"  id="data-nascimentoLabel"><?php if(isset($_SESSION['dataNascimentoErroRegisto']) && isset($_SESSION['ErroRegisto']) && $_SESSION['ErroRegisto'] > time()) echo "<span class='msgErro'>" . $_SESSION['dataNascimentoErroRegisto'] . "</span>"; else echo "Data de Nascimento"; ?></label>
    <input type="date" class="form-control" id="data-nascimento" name="data-nascimento" aria-describedby="emailHelp" placeholder="Data de Nascimento" <?php if(isset($_SESSION['dataNascimentoForm'])) echo "value='" . $_SESSION['dataNascimentoForm'] . "'"; ?>>  
  </div>

   </div><!-- col -->
   <div class="col-md-6"> 

  <div class="form-group">
    <label for="genero">Género</label>
    <select class="form-control" id="genero" name="genero">
      <option>Masculino</option>
      <option>Feminino</option>
    </select>
  </div>
  <div class="form-group">

    <label for="password1" id="passwordLabel"><?php if(isset($_SESSION['passwordErroRegisto']) && isset($_SESSION['ErroRegisto']) && $_SESSION['ErroRegisto'] > time()) echo "<span class='msgErro'>" . $_SESSION['passwordErroRegisto'] . "</span>"; else echo "Password"; ?></label>
    <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="password2">Confirmar Password</label>
    <input type="password" class="form-control" id="password2" name="password2" placeholder="Password">
  </div>

   </div><!-- col -->
  </div> <!-- row -->
  <small class="form-text text-muted">Já está registado? <button type="button" class="btn btn-outline-success btn-sm" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#loginModal">Login</button></small>
        


      </div>
      <div class="modal-footer">
      <button type="submit" value="Registar" class="btn btn-primary" name="Form">Registar</button>
      </div>
      </form>
    </div>
  </div>
</div>
