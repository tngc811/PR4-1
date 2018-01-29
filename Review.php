<?php

$RData = $_POST['RData'];

$RTime =new DateTime();
$RTime =$RTime->format('Y-m-d H:i:s');

$a = $RData;
array_push($a,"1",$RTime);




/*********************PDO******************************/



$a = $RData;
array_push($a,"1",$RTime);

try {

  $dsn = 'mysql:dbname=UserReview;host=localhost';
  $user ='root';
  $password ='root';

  $dbh = new PDO($dsn,$user,$password);
  $dbh->query('SET NAMES utf8');
  $sql = 'INSERT INTO Review(gender,age,num,volume,atmosphere,eva,shopid,userid,RTime) VALUES(?,?,?,?,?,?,?,?,?)';


  $stmt=$dbh->prepare($sql);
  $stmt->execute($a);

  $dbh = null;

  echo "faklfajndfs";


} catch (Exception $e) {

  exit();
}


/******************************************************/
//print_r($RData);
 ?>
