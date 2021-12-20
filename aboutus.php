

<?php 
session_start();

include'connect.php';
if(isset($_SESSION['username'])){ 

	include'templets/afterloginheader.php';
 } else{
include'templets/header.php';}

?>

?>


<div class="about_us">
  <h4>About:</h4>

<p>Breaking News helps you Get unlimited access to breaking news, trusted coverage, and expert analysis.and offer you trusted source for breaking news, analysis, exclusive interviews, headlines, and videos Get unlimited access to breaking news, trusted coverage, and expert analysis offer you trusted source for breaking news, analysis, exclusive interviews, headlines, and videos </p>

<h4>News</h4>
<p>Get unlimited access to breaking news, trusted coverage, and expert analysis.Get unlimited access to breaking news, trusted coverage, and expert analysis offer you trusted source for breaking news, analysis, exclusive interviews, headlines, and videos  .Get unlimited access to breaking news, trusted coverage, and expert analysis</p>

<h4>Team</h4>
<p>Reham , Alshaima , Hadia , Mona create this website in 2021</p>

<h4>Mission</h4>
<p>Get today's headlines and news you need to know  around the world. Get today's headlines and news you need to know  around the world.Get today's headlines and news you need to know  around the world. </p>


<h4>Features</h4>
<ul>
  <li>Get unlimited access to breaking news, trusted coverage, and expert analysis</li>
  <li>offer you trusted source for breaking news, analysis, exclusive interviews, headlines, and videos </li>
  <li> up-to-the-minute news, breaking news, video, audio and feature stories. </li>
  <li>Get unlimited access to breaking news, trusted coverage, and expert analysis</li>
  <li>Get today's headlines and news you need to know  around the world.</li>


</ul>

</div>


<?php include'templets/footer.php'?>