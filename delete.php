<?php
  include("header.php");

  $std_id = $_GET['std_id'];

  $sql = 'DELETE FROM students WHERE std_id=:std_id';   //WHERE std_id=?';
  $statement = $connection->prepare($sql);
  
  if($statement->execute([':std_id'=>$std_id])){        //execute([$std_id]))
    header('Location: index.php');
  }

?>
 

<?php
  include("footer.php");
?>

<?php


//---------------- OR // Alternative Syntax // easy ---------------------
/*
  $sql = 'DELETE FROM students WHERE std_id=?';
  $statement = $connection->prepare($sql);
  
  if($statement->execute([$std_id])){
    header('Location: index.php');
  }

//--------------------------------------------------------------------------
  $sql = 'DELETE FROM students WHERE std_id=:std_id';   //WHERE std_id=?';
  $statement = $connection->prepare($sql);
  
  if($statement->execute([':std_id'=>$std_id])){        //execute([$std_id]))
    header('Location: index.php');

--ekhane... WHERE std_id=:std_id'; ...PDO te ager motho directly value assign kora jai na(= er pore),,ekhane oprer rules e code likle "=" er pore amader ":" diye abar "column_name" ta likhe dithe hobe,pore "execute" korar somoy value ta assign korte hobe,..//
//--------------------------------------------------------------------------

*/