<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>line</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
     
<div class="container">
 <form action="insert_linenotify.php" method="post"><br>
     <h4>ແຈ້ງເຕືອນຜ່ານ line notify</h4><br>
     <?php 
     if(isset( $_SESSION['success'])){ ?>
     <div class="alert alert-success" role="alert">
      <?php echo $_SESSION['success'];
      unset($_SESSION['success']);
      ?>
     </div>
     <?php  } ?> 
     <?php 
     if(isset( $_SESSION['error'])){ ?>
     <div class="alert alert-success" role="alert">
      <?php echo $_SESSION['error'];
      unset($_SESSION['error']);
      ?>
     </div>
     <?php  } ?>
     <br>
     <label for="">name</label>
     <input type="text" name="pname" class="form-control" require>
     <label for="">email</label>
     <input type="email" name="email" class="form-control" require>
     <label for="">address</label>
     <textarea class="form-control" name="address"  rows="4"></textarea>
     <button type="submit" name="submit" class="btn btn-primary mt-4">submit</button>
 </form>
</div>
</body>
</html>