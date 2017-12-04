<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="rateit.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="./jquery.raty.js" type="text/javascript"></script>
    <script type="text/javascript">

    $(function raty() {
      $.fn.raty.defaults.path = "./images";

      $('#rateit1').raty({
        number: 5,
       score : 0,
      });

      $('#btn').click(function() {
          var score = $('#rateit1').raty('score');
          var a = "test";
          console.log(score);
          $.ajax({
              type: 'POST',
              url: './test1.php',
              data:{
                word1:score,
                word2:a
		},
            success: function (data) {
              alert(data);
      }
    });
      });
});


    </script>
  </head>
  <body>
    <form class="" action="index.html" method="post">
        <h4 style="display:inline">性別</h4>
        男性<input type="checkbox" name="" value="">
        女性<input type="checkbox" name="" value="">
        <br>
        <h4 style="display:inline">年代</h4>
        <select class="" name="">
          <option value="10">---</option>
          <option value="10">10代</option>
          <option value="20">20代</option>
          <option value="30">30代</option>
          <option value="40">40代</option>
          <option value="50">50代</option>
          <option value="60">60代~</option>
        </select><br>
        <h4 style="display:inline">人数</h4>
        <select class="" name="">
          <option value="">---</option>
          <option value="">1人</option>
          <option value="">2~4人</option>
          <option value="">5~10人</option>
          <option value="">それ以上</option>
        </select>
        <br>
        <h4 style="display:inline">ボリューム感</h4>
        <select class="" name="">
          <option value="">---</option>
          <option value="">がっつり</option>
          <option value="">ふつう</option>
          <option value="">少なめ</option>
        </select>
        <br>
        <h4 style="display:inline">お店の雰囲気</h4>
        <select class="" name="">
          <option value="">---</option>
          <option value="">静か</option>
          <option value="">にぎやか</option>
          <option value="">一人で入りやすい</option>
          <option value="">女性でも入りやすい</option>
        </select>
        <br>
        <h4 style="display:inline">評価</h4>
        <div style="display:inline" id="rateit1"></div>
        <br>
        <button id="btn" type="button" name="button">送信</button>
    </form>

</html>
