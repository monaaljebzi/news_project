<?php
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

  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" >
    

    <input type="file" name="imge">

    <input type="submit" name="send">
  </form>