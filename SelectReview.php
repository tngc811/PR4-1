<?php
//c
try {
  $dsn = 'mysql:dbname=UserReview;host=localhost';
  $user ='root';
  $password ='root';

  $dbh = new PDO($dsn,$user,$password);
  $dbh->query('SET NAMES utf8');

  $hot_shop_id = 'J000972035';

  $sql = "SELECT * FROM Summary WHERE shopid = '".$hot_shop_id."'";


  $stmt=$dbh->prepare($sql);
  $stmt->execute();


$rec =$stmt->fetch(PDO::FETCH_ASSOC);
  if ($rec == "") {
    echo $rec;
  }else {
    echo json_encode($rec);
  }

} catch (Exception $e) {
  echo "SELCT失敗２";
}
?>
