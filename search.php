<?php

//条件を取得
$array = array(
  '0' => $_POST['age'], //年代
  '1' => $_POST['num'], //人数
  '2' => $_POST['vol'], //量
  '3' => $_POST['atm'], //雰囲気
  '4' => $_POST['eva']  //評価
);
 //　shopid
$data = $_POST['data'];
//条件に合致してるか
$con =array();
//条件に合致したshopidを格納
$agr = array();
/*$age = $_POST['age']; //年代
$num = $_POST['num']; //人数
$vol = $_POST['vol']; //量
$atm = $_POST['atm']; //雰囲気
$eva = $_POST['eva']; //評価
*/
//echo count($array);
//print_r($array);

//DBからIDを基に店舗を検索し、条件に当てはまる店舗IDを返す
//DBにアクセス
try {
  //変えてね！
$pdo = new PDO('mysql:host=localhost;dbname=userreview;charset=utf8','root','',
array(PDO::ATTR_EMULATE_PREPARES => false));
//確認
//echo "success";
/*
送られてきたデータを基に店舗情報を取得し条件に当てはまるか調べる
*/
//送られたshopidの数だけ回す
for($i = 0; $i<count($data); $i++){
  //確認
//  echo "SELECT * FROM summary WHERE 'shopid' = '".$data[$i];
  //select文実行
  $stmt = $pdo->query("SELECT `age`,`num`,`volume`,`atmosphere`,`eva` FROM summary WHERE 'shopid' = '".$data[$i]."'");
//  $stmt = $pdo->query("SELECT `age`,`num`,`volume`,`atmosphere`,`eva` FROM summary WHERE `shopid` = 'J000972035'");
  //$rowに取得したデータを入れる
  $row = $stmt -> fetch(PDO::FETCH_ASSOC);

  if(!empty($row)){
    //空白チェックと条件比較
    for($j = 0; $j<count($array); $j++){
      //初回
      if($j == 0){
        if(!empty($array[$j])){
          if(current($row) == $array[$j]){
            $con[$j] = "同じ";
          }else{
            $con[$j] ="違う";
          }
        }else{
          $con[$j] ="同じ";
        }
      }else if($j == count($array)-1){
        //最後の配列
        if(!empty($array[$j])){
          if(current($row) <= $array[$j]){
            $con[$j] = "同じ";
          }else{
            $con[$j] ="違う";
          }
        }else{
          $con[$j] ="同じ";
        }
      }else{
        //その他の配列
        if(!empty($array[$j])){
          if(next($row) == $array[$j]){
            $con[$j] ="同じ";
          }else{
            $con[$j] ="違う";
          }
        }else{
          $con[$j] ="同じ";
        }
      }
    }
    //チェック終了後
      if($con[0] == "同じ" && $con[1] == "同じ" && $con[2] == "同じ" && $con[3]=="同じ" && $con[4]=="同じ"){
        //合致したshopidを配列に格納
        $agr[$i] = $data[$i];
      }
  }


  }


//データの受け渡し
echo json_encode( $agr );

} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}




?>
