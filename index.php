<?php
    require "header.php";

    if(isset($_SESSION['username'])){
      ?>

      <section class="bg p-3">
        <div class="container">
          <div class="row">
            <div class="col-md-6 text-danger">
              <?php echo "<h2>Welcome ".$_SESSION['username'] ."!</h2>" ; ?>
            </div>
            <div class="col-md-6 text-right">
              <a href="logout.php" class="btn btn-danger btn-lg">Logout</a>
            </div>
          </div>
        </div>
      </section>

    <?php
    }
    else{
      header("Location: login.php");
    }
    

//----------------------------------------------------


    $sql = "SELECT * FROM students";
    $statement = $connection->prepare($sql);
    $statement->execute();

    $student = $statement->fetchAll(PDO::FETCH_OBJ);  //Store all info into $student Array
?>

    <section>
      <div class="container">
        <div class="row">
          <div class="col text-primary text-center p-4">
            <h1>All Students Data are Here: </h1>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <table class="table table-dark table-hover table-striped">
              <thead class="bg-success">
                <tr>
                  <th>Id</th>
                  <th>Full Name</th>
                  <th>Email Adderss</th>
                  <th>Phone Number</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach($student as $human) : ?>
                <tr>
                  <td><?php echo $human-> std_id; ?></td>
                  <td><?php echo $human-> std_name; ?></td>
                  <td><?php echo $human-> std_email; ?></td>
                  <td><?php echo $human-> std_phone; ?></td>
                  <td>
                    <a href="edit.php?std_id=<?php echo $human-> std_id; ?>" class="btn btn-primary btn-sm">Update</a>
                    <a href="delete.php?std_id=<?php echo $human-> std_id; ?>" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </section>



<?php
    include("footer.php"); 
?>

