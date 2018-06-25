<!-- /////////////////////////////////////////////////////////////////
                    FOOTER
/////////////////////////////////////////////////////////////////-->
<footer>
    <p>&copy; Estante | joaorbmendes <?php echo date('Y', time()); ?></p>
  </footer>


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

    <script src="js/main.js"></script>
    <?php if(isset($_SESSION['ErroLogin'])) { ?>
      <script>
        $(document).ready(function(){

          $("#loginModal").modal();

        });
      </script>
    <?php   }  ?>
    <?php if(isset($_SESSION['ErroRegisto']) && $_SESSION['ErroRegisto'] > time()) { ?>
      <script>  
        $(document).ready(function(){
   
          $("#registarModal").modal();
        });
      </script>
    <?php   }  ?>
    <?php if(isset($_SESSION['ErroLogin']) && $_SESSION['ErroLogin'] > time()) { ?>
      <script>  
        $(document).ready(function(){
   
          $("#loginModal").modal();
        });
      </script>
    <?php   }  ?>