
      console.log("map0");

      var shoplat = "34.9791774362";
      var shoplog = "135.7423078657";
      var lat;
      var log;
      //androidかiPhoneを調べる変数
      var isiPhone = 0;
      var isAndroid = 0;

      //機種判別用
      var ua = navigator.userAgent.toLowerCase();

      //iPhoneだった場合1を入れる
       isiPhone = (ua.indexOf('iphone') > -1 );
      // Androidの場合1を入れる
       isAndroid = (ua.indexOf('android') > -1);
      //位置情報を取得できるか確認する。

      //位置情報取得する場合に必要な関数。(初めに呼ばれる)

      function initMap() {
        //ユーザーエージェントを調べる
        // Geolocation APIに対応しているかどうか
        if (navigator.geolocation) {
          alert("この端末では位置情報が取得できます");
        // Geolocation APIに対応していない
        } else {
        alert("この端末では位置情報が取得できません");
        }



      //現在地を取得するための処理

      }
      function cmanGetOk(argPos){
        lat = argPos.coords.latitude;          // 緯度
        log = argPos.coords.longitude;         // 経度
        console.log(lat);
        console.log(log);

      }
  navigator.geolocation.getCurrentPosition(cmanGetOk)

        //ボタン押されたとき

        if (isAndroid > 0){
          console.log("adfgf");
          //google map起動(現在地から目的地までのルート)
          location.href = 'https://maps.google.com/maps?daddr='+shoplat+','+shoplog+'&saddr='+lat+','+log;
        } else{
          console.log("adfgf55555454345");
          //アップルのマップを起動(現在地から目的地までのルート)
          location.href = 'http://maps.apple.com/maps?daddr=' + shoplat + ',' + shoplog+'&saddr='+lat+','+log;
        }




      //店の座標いれてね

  document.write('<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAb3Mm8zzsqCNFTr-_LNNkQMtYKTV000PA&callback=initMap" async defer></script>');*/
