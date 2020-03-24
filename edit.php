<?php
    require "header.php";
?>

    <section>
      <div class="container">
        <div class="row">
          <div class="col text-center text-primary">
            <h1 class="p-4">Update Student Data:</h1>
          </div>
        </div>

        <?php

          $std_id= $_GET['std_id'];

          $sql= 'SELECT * FROM students WHERE std_id=:std_id';
          $statement = $connection->prepare($sql);
          $statement->execute([':std_id'=>$std_id]);

          $student = $statement->fetch(PDO::FETCH_OBJ);


          if(isset($_POST['update'])){       
            $fullname = $_POST['fullname'];
            $email    = $_POST['email'];
            $phone    = $_POST['phone'];
          
          $sql = 'UPDATE students SET std_name=:std_name,std_email=:std_email,std_phone=:std_phone WHERE std_id=:std_id';
          $statement = $connection->prepare($sql);
          
          if($statement->execute([':std_name'=>$fullname,':std_email'=>$email,':std_phone'=>$phone,':std_id'=>$std_id])){
            header("Location: index.php");
          }

          }

        ?>

        <div class="row">
          <div class="col-md-6 offset-md-3">

            <form action="" method="post">
              <div class="form-group">
                <label for="username">Full Name</label>
                <input type="text" name="fullname" id="username" class=" form-control" autocomplete = "off" required value="<?php echo $student-> std_name; ?>" >
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" autocomplete = "off" required value="<?php echo $student-> std_email; ?>" >
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone" class="form-control" autocomplete = "off" required value="<?php echo $student-> std_phone; ?>" >
              </div>
              <div class="form-group">
                <input type="submit" value="Update" name="update" autocomplete="off" class="btn btn-primary">
              </div>

            </form>
          </div>
        </div>
      </div>
    </section>



<?php
    include("footer.php"); 
?>


<!-- //---------------- OR // Alternative Syntax //easy  --------------------- -->
<!--      
      $sql = 'UPDATE students SET std_name=?,std_email=?,std_phone=? WHERE std_id=?';
      $statement = $connection->prepare($sql);
      
      if($statement->execute([$fullname,$email,$phone,$std_id])){
        header("Location: index.php");
      } 

//----------------------------- OR ------------------------------------------
      $sql = 'UPDATE students SET std_name=:std_name,std_email=:std_email,std_phone=:std_phone WHERE std_id=:std_id';
      $statement = $connection->prepare($sql);
      
      if($statement->execute([':std_name'=>$fullname,':std_email'=>$email,':std_phone'=>$phone,':std_id'=>$std_id]))

//------------------- another Alternative ---------------------------

			$statement->execute(
				array(
					'username' => $_POST['username'],
					'password' => $_POST['password']
				)
      );
//-------------------------------------------------------------------------     
-->