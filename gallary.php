<?php 

session_start();
include'connect.php';
include'templets/afterloginheader.php';

$NAME=array();

if (isset($_SESSION['username'])){

  $NAME['NAME']= "Welcome  ".$_SESSION['username']."!!";
}
else{
   header('Location:index.php');
   exit();

}



?>




<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
       <h1 class="fw-light " style="color: rgb(180, 141, 14)!important;"><?php echo  $NAME['NAME'] ?> </h1>
      <div class="col-lg-6 col-md-8 mx-auto">


        <h1 class="fw-light">Browse the News Website For Free </h1>
        <p class="lead text-muted">  free news and photos that you can download and use for any project.</p>
        <p>
          <a href="aboutus.php" class="btn btn-primary my-2">Learn More</a>
          <a href="comment.php" class="btn btn-secondary my-2">Add Comment</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
                                    $stm = $con->prepare("select * from posts");
                                    $stm->execute();
                                    if ($stm->rowCount()) {
                                        foreach ($stm->fetchAll() as $row) {

                                           $imgid=$row['postid'];
                                            $name = $row['imgname'];
                                            $des=$row['description'];
                                        
                                       


                                    ?>


        <div class="col">
          <div class="card shadow-sm">
            <img src="admin/upload/<?php echo  $name = $row['imgname'];?>" style="max-height: 250px;">

            <div class="card-body">
              <p class="card-text"><?php $name ;?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
              
               <p> <?php echo"$des" ?>      </p>




                  
                  <?php





                  ?>
                </div>
                
              </div>
            </div>
          </div>
        </div>
                                                <?php  }
                                    } else { ?>

                                        <div class='alert alert-danger'>THERE IS NO POSTS </div>
                                    <?php } ?>

</main>

	<!-- end gallary -->


	<?php include'templets/footer.php'?>