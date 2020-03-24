<?php  include("header.php")  ?>

  <?php

    if(isset($_POST['login'])){

      if(empty($_POST['username']) || empty($_POST['password'])){
        $message = '<div class="alert alert-primary">Username and Password is Required.<br>Please Check Your Information.</div>';
      }
      else {
        $sql = "SELECT * FROM users WHERE username=:username AND password=:password";
        $statement = $connection->prepare($sql);
        
        if($statement->execute([":username"=> $_POST['username'],":password"=> $_POST['password']])); 

        $count= $statement->rowCount();   //value=1

        if($count>0){
          $_SESSION['username'] = $_POST["username"];
          header("Location: index.php");
        }
        else {
          $message = '<div class="alert alert-primary">Username and Password 
          Does Not Match!!!</div>';
        }
      }  
    }
  
  
  ?>  

  <section class="bb">
    <div class="container">
      <div class="row p-5">
        <div class="col-md-6 offset-md-3">
          <h1 class="pb-3 text-light text-center">Administrator Login:</h1>
          
          <?php
            if(isset($message)){
             echo($message);
            }
          ?>
          <!-- or, ?php echo($message); ?> -->

          <form action="" method="post" class="text-light h3">
            <div class="form-group">
              <label for="username">Username *</label>
              <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
              <label for="Pass">Password *</label>
              <input type="password" name="password" id="pass" class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" name="login" value="Login" class="btn btn-primary btn-lg">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>



<?php  include("footer.php")  ?>

