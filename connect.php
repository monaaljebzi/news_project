<?php

	

$dns='mysql:host=localhost;dbname=news2';
$user='root';
$pass='';
$option=array(
    PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8',
);
try{
$con=new PDO($dns,$user,$pass,$option);

}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>