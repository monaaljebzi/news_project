<?php
include'connect.php';


 if(isset($_POST['upload']))
{
  $category=$_POST['imgcat'];
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
    echo "Not Upload file <br>";
  }
  else
  {
      if (!in_array($img_ext, $exts)) {
          $errors[] = "exs not accpect <br>";
      }
      if($file_size > 2000000000)
      {
        $errors[]= "file is larg <br>";
      }
      if(empty($errors)) {
       
        move_uploaded_file($file_tmp, "upload/".$file_name);

           
          
          
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
    <img class="mb-4" src="layout/img/spring.png" alt="" width="150" height="57" style="margin-left: 45%;">
    <h1 class="align">Profile</h1>
 

  <?php
  if(isset($_SESSION['username']) && ($_SESSION['pri_id']==2)){
                            if(isset($_GET['action'],$_GET['id']) && $_GET['action']=='edit' )
                            {
                                $id=$_GET['id'];
                             $stm = $con->prepare("select * from users where userid=:id");
                             $stm->execute(array("id"=>$id));
                             if ($stm->rowCount()) {
                               
                                 foreach ($stm->fetchAll() as $row) {
                                            $id = $row['userid'];
                                            $name = $row['username'];
                                            $password = $row['password'];
                                            $email = $row['email'];
                                            $gender=$row['gender'];
                                            $birthdate=$row['birthdate'];
                                            $joindate = $row['joindate'];
                                            $profile=$row['profilename'];
                                            
                                   
                            if (isset($_POST['send'])) {
                                $id=$_POST['id'];
                                $name=trim($_POST['username']);
                                    $password=trim(sha1($_POST['pass']));
                                    $email=trim($_POST['email']);
                                    $gender=$_POST['gender'];
                                    $birthdate=$_POST['birthdate'];
                                  
                                
                                $errors = array();
                                
                                if (empty($name)) {
                                    $errors['cname'] = "<div style='color:red'>Enter Name of Category</div>";
                                } elseif (is_numeric($name)) {
                                    $errors['cnameNumber'] = "<div style='color:red'>Enter String Name of Category</div>";
                                } else {
                                    $sql = "update users set username=? , email=?,password=?,gender=?,birthdate=?  where userid=? ";
                                    $stm = $con->prepare($sql);
                                    $stm->execute(array($name, $email ,$password ,$gender, $birthdate, $id));
                                    if ($stm->rowCount()) {
                                        echo "<script>
                                        alert('One Row Updated');
                                        window.open('gallary.php','_self');
                                         </script> 
                                        ";
                                    } else {
                                        echo "<div class='alert alert-danger'>One Row  not Updated </div>";
                                    }
                                }
                            }
                
                            
                            ?>




                            ?>

    <div class="input">
  <form method="post" ">
    

    <div >
    	<input type="text" name="username" value="<?php $name ?>" class="form-control" id="floatingInput" placeholder="user name" class="form" required>
      <label >User name</label>
      <?php if(isset( $errors['uname'])) echo  $errors['uname'];?>
      <?php if(isset( $errors['unameNumber'])) echo  $errors['unameNumber'];?>



      <input type="email" value="<?php $email ?>" name='email'class="form-control" id="floatingInput" placeholder="name@example.com" class="form" style="margin-top: 6%;">
      <label >Email address</label>
    </div>
    <div >
      <input type="password" value="<?php $password ?>" name="pass" class="form-control" id="floatingPassword" placeholder="Password" style="margin-top: 6%;" required>
      <label >Password</label>

    </div>

    <div >
     <select   class="form-control" name="gender">
      
      <option  value="male">Male</option>
      <option  value="female">Female</option>
      
    </select>
<label >Gender</label>
    </div>

    <div >
      <input type="date" value="<?php $birthdate ?>" name="birthdate" class="form-control" id="floatingPassword" placeholder="Birth Date yyyy-mm-dd" style="margin-top: 6%;" required>
      <label >Birth Date</label>

    </div>
    <div>
<input  type="file"  name="imge" value="choose image" >
</div>
    <div>
      <label>
        <p >You are already have account  <a href="login.php">login</a></p>
      
        <input type="checkbox" value="remember-me" style="margin-top: 10%;"> Remember me
      </label>
    </div>
    </div>
    <button class="w-25 btn btn-lg btn-primary" name="send" type="submit">edit</button>
    <p  class="copy">&copy; 2017–2021</p>
  </form>

</main>
<?php }}}} ?>
<script type="text/javascript" src="layout/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="layout/js/bootstrap.min.js"></script>
</body>
</html>