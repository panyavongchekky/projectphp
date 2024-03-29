
<?php include 'menu1.php' ;?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>register</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
      <div class="container">
        <br>
       <div class="row">
       <div class="col-md-5 bg-light text-dark">
   
      <div class="alert alert-primary h3" role="alert">
      ສະໝັກສະມາຊີກ
      </div>
      <br>
      <form method="post" action="insert_register.php">
      ຊື່ <input type="text" name="firstname"  class="form-control" require>
      ນາມສະກຸນ <input type="text" name="lastname"  class="form-control" require>
      ເບີໂທລະສັບ <input type="number" name="phone"  class="form-control" require>
      username <input type="text" name=" "  class="form-control" require>
      password <input type="text" name="password"  class="form-control" require><br>
      <input type="submit" name="submit" value="ບັນທືກ" class="btn btn-primary ">
      <input type="submit" name="cancel" value="ຍົກເລີກ" class="btn btn-primary"><br>
      <a href="login.php "> login </a>
      </form>
   </div>
  </div>
 </div>
</body>
</html>




