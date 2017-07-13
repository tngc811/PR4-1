(function($){
  $.fn.hoge=function(){
//  $(this).click(function(){
    if (navigator.geolocation) {
      function get_location(argPos) {
        var lat;
        var log;
        lat = argPos.coords.latitude;          // 緯度
        log = argPos.coords.longitude;         // 経度
        console.log(lat,log);
        result_location(argPos.coords);
      }

      function no_get_location(error) {
        //.エラーコードの定義
      //エラーの表示
      alert("失敗１");
      }
      navigator.geolocation.getCurrentPosition(get_location,no_get_location) ;

    }else {
      alert("失敗２")
    }
//  });
  };

})(jQuery);
