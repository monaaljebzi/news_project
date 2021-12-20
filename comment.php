<?php
session_start();

include'connect.php';
if(isset($_SESSION['username'])){ 

	include'templets/afterloginheader.php';
 } else{
include'templets/header.php';}

?>

<!-- contact us -->
<main >
    <img class="mb-4" src="layout/img/777.jpg" alt="" width="150" height="57" style="margin-left: 45%;">
    <h1 class="align">send your comment</h1>
    <div class="input">
  <form method="post">
     <?php


                                if(isset($_POST['send'])){

                                    $name=trim($_POST['username']);
                                    
                                    $email=trim($_POST['email']);

                                    $massage=htmlentities(trim($_POST['massage']));

                                   

                                    $errors=array();

                                    if(empty($name)){
                                        $errors['uname']="<div style='color:red'>Enter Name of User</div>";
                                    }


                                    elseif(is_numeric($name)){
                                        $errors['unameNumber']="<div style='color:red'>Enter String Name of User</div>";
                                    }

                                    else{

                                    $stm = $con->prepare("insert into comments(name,email,massage)
                                                         values(?,?,?)");
                                    $stm->execute(array($name,$email, $massage));

                                    if ($stm->rowCount()){

                                        echo "<div class='alert alert-success'>Massage Sent </div>";
                                    } else {
                                        echo "<div class='alert alert-danger'> Massage Not Sent </div>";
                                    }
                                    
                                    }



                                }



                            ?>


    <div >
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Name" class="form">
      <label >user name</label>
      <?php if(isset( $errors['uname'])) echo  $errors['uname'];?>
      <?php if(isset( $errors['unameNumber'])) echo  $errors['unameNumber'];?>
    </div>
    <div >
      <input type="email" name="email" class="form-control" id="floatingPassword" placeholder="name@example.com" style="margin-top: 6%;">
      <label >Email</label><br><br>
    </div>
    <textarea name="massage" cols="36"rows="10"placeholder="Send your suggestions"class="textarea"></textarea>
   
    </div>
    <button name="send" class="w-25 btn btn-lg btn-primary" type="submit">Send</button>
    
  </form>


</main>
<!-- end contact us -->


<?php include'templets/footer.php'?>