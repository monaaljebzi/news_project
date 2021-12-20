<?php
session_start();
include'templets/afterloginheader.php';

?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2><i class="fa fa-users"></i> PROFILE</h2>


                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-8">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-plus-circle"></i> Edit Profile
                            </div>


                            <?php

 							if(isset($_GET['action'],$_GET['id']) && $_GET['action']=='edit' )
                            {
                             $id=$_GET['id'];
                             $stm = $con->prepare("select * from users where userid=:id");
                             $stm->execute(array("id"=>$id));
                             if ($stm->rowCount()) {
                               
                                 foreach ($stm->fetchAll() as $row) {
                                     $name=$row['username'];
                                    $password=$row['password'];
                                    $email=$row['email'];
                                    $gender=$row['gender'];
                                    $birthdate=$row['birthdate'];
                                   $pri_id=$row['pri_id'];
                                   $profilename=$row['profilename'];

                                if(isset($_POST['send'])){

                                    
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
          $errors['exs'] = "exs not accpect <br>";
      }
      if($file_size > 2000000000)
      {
        $errors['large']= "file is large <br>";
      }
      if(empty($errors)) {
       
        move_uploaded_file($file_tmp, "upload/".$file_name);
         }
      else
      {
        foreach($errors as $error)
        {
          echo $error;
        }}}



                                	$id=$_POST['id'];
                                    $name=trim($_POST['name']);
                                    $password=trim($_POST['pass']);
                                    $email=trim($_POST['email']);
                                    $gender=$_POST['gender'];
                                    $birthdate=$_POST['birthdate'];
                                    $profilename=$_FILES['imge']['name'];
                                    $errors=array();

                                    if(empty($name)){
                                        $errors['uname']="<div style='color:red'>Enter Name of User</div>";
                                    }


                                    elseif(is_numeric($name)){
                                        $errors['unameNumber']="<div style='color:red'>Enter String Name of User</div>";
                                    }

                                    else{

                                    $stm = $con->prepare("update users set username=? ,password=?,email=?,gender=?,birthdate=?,profilename=?
                                                        where userid=?");
                                    $stm->execute(array($name,$password,$email,$gender,$birthdate,$profilename,$id));

                                    if ($stm->rowCount()){

                                        echo "<script>
                                        alert('One Row Updated');
                                        window.open('gallary.php','_self');
                                         </script> 
                                        ";
                                    } else {
                                        echo "<div class='alert alert-danger'> Row  not Updated </div>";
                                    }
                                    
                                    }}



                                



                            ?>









                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form role="form" method="post" enctype="multipart/form-data">
<img src="upload/<?php echo $row['profilename']; ?>" alt="mdo" width="120" height="120" class="rounded-circle" style="margin-left: 50%;"><br><br>


<input  type="file" name="imge" style="margin-left: 52%;">

                                        	 <input type="hidden" name="id" value="<?php echo $id ?>" >
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" value="<?php echo $name;?>" placeholder="Please Enter your Name "
                                                   name="name" class="form-control" />
                                                   <?php if(isset( $errors['uname'])) echo  $errors['uname'];?>
                                                   <?php if(isset( $errors['unameNumber'])) echo  $errors['unameNumber'];?>

                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" value="<?php echo $email;?>" class="form-control"
                                                   name="email" placeholder="PLease Enter Eamil" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" value="<?php echo $password;?>" class="form-control"
                                                  name="pass"  placeholder="Please Enter password" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select  class="form-control" name="gender">
      
     											 <option  value="male">Male</option>
      											 <option  value="female">Female</option>
      											</select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Birth Date</label>
                                                <input  value="<?php echo $birthdate;?>"  style="margin-left=10%;" type="date" name="birthdate" class="form-control" id="floatingPassword" placeholder="Birth Date yyyy-mm-dd" style="margin-top: 6%;" required>

                                            </div>
                                            
                                              
                                                   
                                                   
                                            
                                            <div style="float:right;">
                                                <button type="submit" name="send"class="btn btn-primary">EDIT</button>
                                                <button type="reset" class="btn btn-danger">Cancel</button>
                                            </div>

                                    </div>
                                    <?php }}} ?>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables --><div class="panel-body">





                        
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
   </div>
   
   <?php
   include'templets/footer.php'
   ?>

   