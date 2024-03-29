<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>login</title>
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >


</head>
<body>
     
<div class="container">
  <div class="row">
    <div class="col-md-3 badge bg-light text-dark">
           <h5>login</h5>
           <form action="login_check.php" method="post">
            <input type="text" name="username" class="form-control" require placeholder="username"><br>
            <input type="password" name="password" class="form-control" require placeholder="password"><br>
            <?php 
            if(isset($_SESSION["error"])){
                    echo "<div class='text-danger'>";
                    echo $_SESSION["error"];
                    echo "</div>";
            }
            $_SESSION['error'] ="";
            ?>
            <input type="submit" name="submit" value="login"  class="btn btn-primary  ">

           </form>
      
    </div>
  
  </div>

</div>

</body>
</html>