<?php
    require "header.php";
?>

    <section class="bb">
      <div class="container text-light">
        <div class="row">
          <div class="col text-center p-3">
            <h1>Add New Student: </h1>
          </div>
        </div>

        <?php

          $successMessage = "";   //default $successMessage is Empty

          if(isset($_POST['submit'])){
            // echo "thanks";
            $fullname = $_POST['fullname'];
            $email    = $_POST['email'];
            $phone    = $_POST['phone'];
          
          $sql = 'INSERT INTO students (std_name,std_email,std_phone) VALUES (:std_name,:std_email,:std_phone)';

          $statement = $connection->prepare($sql);

          if($statement->execute([':std_name'=>$fullname,':std_email'=>$email,':std_phone'=>$phone]))
          {
            $successMessage = '<div class="alert alert-success">New Student Registered Successfully</div>';
          }
          else{
            $successMessage = '<div class="alert alert-danger">Registered Failed</div>';
          }

        }
        ?>

        <div class="row h4">
          <div class="col-md-6 offset-md-3">

            <form action="" method="post">
              <div class="form-group">
                <label for="username">Full Name</label>
                <input type="text" name="fullname" id="username" class=" form-control" autocomplete = "off" required >
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" autocomplete = "off" required >
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone" class="form-control" autocomplete = "off" required >
              </div>
              <div class="form-group">
                <input type="submit" value="Register" name="submit" autocomplete="off" class="btn btn-primary btn-lg">
              </div>

              <?php if(!empty($successMessage)) : ?>
                <?php echo $successMessage; ?>
              <?php endif; ?>

            </form>
          </div>
        </div>
      </div>
    </section>



<?php
    include("footer.php"); 
?>