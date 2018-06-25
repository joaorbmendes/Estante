<!-- /////////////////////////////////////////////////////////////////
                    LOGIN
/////////////////////////////////////////////////////////////////-->
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>    
       <form action="validation.php" method="post">
      <div class="modal-body">
 
  <div class="form-group">
  <?php if(isset($_SESSION['mensagem']) && isset($_SESSION['ErroLogin']) && $_SESSION['ErroLogin'] > time()) echo "<p class='msgErro'>" . $_SESSION['mensagem'] . "<p>"; ?>
  <?php if(isset($_SESSION['emailErro']) && isset($_SESSION['ErroLogin']) && $_SESSION['ErroLogin'] > time()) echo "<p class='msgErro'>" . $_SESSION['emailErro'] . "<p>"; ?>
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" <?php if(isset($where['email'])) echo "value='" . $where['email'] . "'"; ?>>
    
  </div>
  <div class="form-group">
  <?php if(isset($_SESSION['passwordErro']) && isset($_SESSION['ErroLogin']) && $_SESSION['ErroLogin'] > time()) echo "<p class='msgErro'>" . $_SESSION['passwordErro'] . "<p>"; ?>
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    <small class="form-text text-muted">Esqueceu-se da Password? <u>recuperar</u></small>
  </div>
  <small class="form-text text-muted">Ainda não está registado?         <button type="button" class="btn btn-outline-success btn-sm" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#registarModal">Registar</button></small>

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="Form" value="Login">Login</button>
      </div>
      </form>
    </div>
  </div>
</div>