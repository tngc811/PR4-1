<?php
/*********************PDO******************************/

try {

  $loopcnt;
  $review = array();

  $dsn = 'mysql:dbname=UserReview;host=localhost';
  $user ='root';
  $password ='root';

  $dbh = new PDO($dsn,$user,$password);
  $dbh->query('SET NAMES utf8');



  while (ture) {
    $sql = 'SELECT * FROM Review LIMIT 0,1';
    $stmt=$dbh->prepare($sql);
    $stmt->execute();

    $rec =$stmt->fetch(PDO::FETCH_ASSOC);
    print($rec['shopid']);
    print('<br/>');

    if ($rec == false) {
      break;
    }


    $shopid = $rec[shopid];

    $sql = "SELECT * FROM Review WHERE shopid = '".$rec[shopid]."'";

    $stmt=$dbh->prepare($sql);
    $stmt->execute();



  while (ture) {
    $rec =$stmt->fetch(PDO::FETCH_ASSOC);

    if ($rec == false) {
      break;
    }
    print($rec['shopid']);

    $loopcnt++;
    $review[1] = $review[1] + $rec['gender'];
    $review[2] = $review[2] + $rec['age'];
    $review[3] = $review[3] + $rec['num'];
    $review[4] = $review[4] + $rec['volume'];
    $review[5] = $review[5] + $rec['atmosphere'];
    $review[6] = $review[6] + $rec['eva'];
    $review[7] = $rec['shopid'];

    print('<br/>');

  }

  echo "編集前";
  print_r($review);
  print('<br/>');


  $review[1] = ceil(($review[1] + $rec['gender'])/$loopcnt);
  $review[2] = ceil(($review[2] + $rec['age'])/$loopcnt);
  $review[3] = ceil(($review[3] + $rec['num'])/$loopcnt);
  $review[4] = ceil(($review[4] + $rec['volume'])/$loopcnt);
  $review[5] = ceil(($review[5] + $rec['atmosphere'])/$loopcnt);
  $review[6] = ceil(($review[6] + $rec['eva'])/$loopcnt);
  print('<br/>');

  echo "編集後";

  print_r($review);
  print('<br/>');


      $dbh = new PDO($dsn,$user,$password);
      $dbh->query('SET NAMES utf8');

      $sql = "SELECT * FROM Summary WHERE shopid = '".$review[7]."'";
      $stmt=$dbh->prepare($sql);
      $stmt->execute();

      $rec = "";
      $rec =$stmt->fetch(PDO::FETCH_ASSOC);


      if ($rec == "") {

        $dbh = new PDO($dsn,$user,$password);
        $dbh->query('SET NAMES utf8');

        $sql = "INSERT INTO Summary(gender,age,num,volume,atmosphere,eva,shopid) VALUES('".$review[1]."','".$review[2]."','".$review[3]."','".$review[4]."','".$review[5]."','".$review[6]."','".$review[7]."')";
      //  $sql = "INSERT INTO Summary gender='".$review[1]."'".",age='".$review[2]."',num='".$review[3]."',volume='".$review[4]."',atmosphere='".$review[5]."',eva='".$review[1]."',shopid = '".$review[7]."'";
        echo $sql;

        $stmt=$dbh->prepare($sql);

        $stmt->execute();
        print_r($review);
        print('<br/>');

        $sql = "DELETE FROM Review WHERE shopid = '".$shopid."'";

        print('<br/>');print('<br/>');

        echo $sql;

        $stmt=$dbh->prepare($sql);
        $stmt->execute();



      }else {


        $sql = "SELECT * FROM Summary WHERE shopid = '".$rec[shopid]."'";

        $stmt=$dbh->prepare($sql);
        $stmt->execute();

        echo "*****************";

        print_r($review);
        print('<br/>');

        $review[1] = ceil(($review[1] + $rec['gender'])/2);
        $review[2] = ceil(($review[2] + $rec['age'])/2);
        $review[3] = ceil(($review[3] + $rec['num'])/2);
        $review[4] = ceil(($review[4] + $rec['volume'])/2);
        $review[5] = ceil(($review[5] + $rec['atmosphere'])/2);
        $review[6] = ceil(($review[6] + $rec['eva'])/2);

        echo "最終";

        print_r($review);


        $sql = "UPDATE Summary SET gender='".$review[1]."'".",age='".$review[2]."',num='".$review[3]."',volume='".$review[4]."',atmosphere='".$review[5]."',eva='".$review[1]."' WHERE shopid = '".$rec[shopid]."'";
        echo $sql;
        $stmt=$dbh->prepare($sql);
        $stmt->execute();

        $sql = "DELETE FROM Review WHERE shopid = '".$rec[shopid]."'";

        print('<br/>');print('<br/>');

        echo $sql;

        $stmt=$dbh->prepare($sql);
        $stmt->execute();



      }

}

    }catch (Exception $e) {
      exit();
    }
$dbh = null;




/******************************************************/
?>
