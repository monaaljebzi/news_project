<?php
include'connect.php';


 if(isset($_POST['send']))
{


  $file=$_FILES['imge'];
  $file_name=$_FILES['imge']['name'];
  $file_tmp=$file['tmp_name'];
  
  $file_error=$file['error'];
  $file_size=$file['size'];
  $errors=array();
  $exts=array('jpg','png','jpeg','gif');
  $ex_name=explode('.',$file_name);
  $img_ext=strtolower(end($ex_name));
  if($file_error == 4 )
  {
    echo "<div class='alert alert-danger'> Choose Photo </div>";
  }
  else
  {
      if (!in_array($img_ext, $exts)) {
          $errors[] = "<div class='alert alert-danger'> Extion not accpected </div>";
      }
      if($file_size > 2000000000)
      {
        $errors[]= "<div class='alert alert-danger'> File is too large</div>";
      }
      if(empty($errors)) {
       
        move_uploaded_file($file_tmp, "upload/".$file_name);
                                    $name=trim($_POST['username']);
                                    $password=trim(sha1($_POST['pass']));
                                    $email=trim($_POST['email']);
                                    $gender=$_POST['gender'];
                                    $birthdate=$_POST['birthdate'];
                                    $profilename=$file_name=$_FILES['imge']['name'];
                                    $pri_id=2;

                                    $errors=array();

                                    if(empty($name)){
                                        $errors['uname']="<div style='color:red'>Enter Name of User</div>";
                                    }


                                    elseif(is_numeric($name)){
                                        $errors['unameNumber']="<div style='color:red'>Enter String Name of User</div>";
                                    }

                                    else{

                                    $stm = $con->prepare("insert into users(username,password,email,gender,birthdate,profilename,pri_id)
                                                         values(?,?,?,?,?,?,?)");
                                    $stm->execute(array($name,$password,$email,$gender,$birthdate,$profilename,$pri_id));

                                    if ($stm->rowCount()){

                                        header('Location:login.php');
                                        exit();
                                    } else {
                                        echo "<div class='alert alert-danger'> Account Not Created</div>";
                                    }
                                    
                                    }

           
          
          
      }
      else
      {
        foreach($errors as $error)
        {
          echo $error;
        }
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

<main >
    <img class="mb-4" src="layout/img/777.jpg" alt="" width="150" height="80" style="margin-left: 45%;">
    <h1 class="align">Please sign up</h1>

    

    <div class="input">
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
    

    <div >
    	<input type="text" name="username" class="form-control" id="floatingInput" placeholder="user name" class="form" required>
      <label >User name</label>
      <?php if(isset( $errors['uname'])) echo  $errors['uname'];?>
      <?php if(isset( $errors['unameNumber'])) echo  $errors['unameNumber'];?>
      <input type="email" name='email'class="form-control" id="floatingInput" placeholder="name@example.com" class="form" style="margin-top: 6%;">
      <label >Email address</label>
    </div>
    <div >
      <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password" style="margin-top: 6%;" required>
      <label >Password</label>

    </div>

    <div >
     <select  class="form-control" name="gender">
      
      <option  value="male">Male</option>
      <option  value="female">Female</option>
      
    </select>
<label >Gender</label>
    </div>

    <div >
      <input type="date" name="birthdate" class="form-control" id="floatingPassword" placeholder="Birth Date yyyy-mm-dd" style="margin-top: 6%;" required>
      <label >Birth Date</label>

    </div>
    <div>
<input  type="file"  name="imge" >
</div>
    <div>
      <label>
        <p >You are already have account  <a href="login.php">login</a></p>
      
      </label>
    </div>
    </div>
    <button class="w-25 btn btn-lg btn-primary" name="send" type="submit">Sign in</button>
    <p  class="copy">&copy; 2020–2021</p>
  </form>
</main>

<script type="text/javascript" src="layout/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="layout/js/bootstrap.min.js"></script>
</body>
</html>