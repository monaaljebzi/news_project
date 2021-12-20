<?php


session_start();



include'connect.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){

  $username=trim($_POST['username']);
  $password=trim($_POST['pass']);
  $hashedpass=sha1($password);
  $_SESSION['profilename']='';


    $stmt=$con->prepare('SELECT *
                         FROM users 
                         WHERE username=?
                         and password=?
                         and active=0
                      ');
    $stmt->execute(array($username,$hashedpass));
    $count=$stmt->rowcount();
 $_SESSION['id']='';
 

    if($count>0){
       foreach ($stmt->fetchAll() as $row) {
          $_SESSION['id']=$row['userid'];
          $id=$_SESSION['id'];
          $_SESSION['username']=$username;
          $_SESSION['pri_id']=$row['pri_id'];
          $_SESSION['profilename']=$row['profilename'];


         
       }
      if(isset($_SESSION['username'])&& $_SESSION['pri_id']==2){

  header('Location:gallary.php');
  exit();
}

elseif(isset($_SESSION['username'])&& $_SESSION['pri_id']==1){

  header('Location: gallary.php');
  exit();
}

else{

  header('Location:index.php');
  exit();
}


      
}
   
  }

?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin</title>

	<link rel="stylesheet" type="text/css" href="layout/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="layout/css/rtl.css">
	<script src="layout/js/backend.js"></script>
	<script src="layout/js/html5shiv.min.js"></script>
	<script src="layout/js/respond.min.js"></script>
</head>
<body class="image">


	<main >
    <img class="mb-4" src="layout/img/777.jpg" alt="" width="150" height="" style="margin-left: 45%;">
    <h1 class="align">Please login</h1>
    <div class="input">
  <form method="post" action="<?php echo$_SERVER['PHP_SELF']?>">
    

    <div >
      <input type="text" name="username"class="form-control" id="floatingInput" placeholder="User Name" class="form" required>
      <label >User Name</label>
      
    </div>
    <div >
      <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password" style="margin-top: 6%;" required>
      <label >Password</label>
    </div>

    <div>
      <label>
        <p >If  you do not have an account  <a href="signup.php">signup</a></p>
        

      </label>
    </div>
    </div>
    <button name="send" class="w-25 btn btn-lg btn-primary" type="submit">login</button>
    <p  class="copy">&copy; 2020–2021</p>



  </form>
</main>



	<script type="text/javascript" src="layout/js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="layout/js/bootstrap.min.js"></script>
</body>
</html>

