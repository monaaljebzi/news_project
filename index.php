 

<?php 
session_start();

include'connect.php';
if(isset($_SESSION['username'])){ 

  include'templets/afterloginheader.php';
 } else{
include'templets/header.php';}




?>









 <!-- slider start -->
  
  <main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="layout/img/2 (2).jpg" alt="First slide">  
        <div class="container">
          <div class="carousel-caption text-start">
          <h1>Tecnoligy News</h1>
            <p>free fully Magazine for puplic and society
                        by Yemeni Researchers.</p>
            <p><a class="btn btn-lg btn-primary" href="signup.php">Sign up today</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="layout/img/walls-6157947__480.jpg" alt="First slide">  
        <div class="container">
          <div class="carousel-caption">
           
                        <h1>Science News</h1>
            <p>free fully Magazine for puplic and society</p>
            <p><a class="btn btn-lg btn-primary" href="aboutus.php">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="layout/img/p4.jpg" alt="First slide">  

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Space News</h1>
            <p>You can see a lot of thing about space on ouer website  .</p>
            <p><a class="btn btn-lg btn-primary" href="signup.php">Browse New</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  
</div></main>
<!-- slider end -->

<main class="px-3">
  <div class="m_home">
    <h1>free fully Magazine for puplic </h1>
    <p class="lead">Choose from the our website to know the fact new and you can singup in our website we are the best</p>
    <p class="lead">
      <a href="aboutus.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Learn more</a>
    </p>
  <style>
.m_home h1{
  width: 700px;
  margin-top: 3%;
  margin-left: 8%;
  color: rgb(180, 141, 14)!important;
}
.carousel-item h1{

  color: rgb(180, 141, 14)!important;

}
.m_home p{
color:white;

}
  </style>
      
        
          
      </div>

    </div>
  </main>








<?php include'templets/footer.php'?>
