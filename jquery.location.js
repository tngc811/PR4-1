(function($){
  $.fn.hoge=function(){
  $(this).click(function(){
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(get_location,no_get_location) ;
        var lat;
        var log;

      function get_location(argPos) {
        lat = argPos.coords.latitude;          // 緯度
        log = argPos.coords.longitude;         // 経度
        console.log(lat,log);



      }
      function no_get_location(error) {
        //.エラーコードの定義
      //エラーの表示
      alert("失敗１");
      }
    }else {
      alert("失敗２")
    }
  });
  };
})(jQuery);
