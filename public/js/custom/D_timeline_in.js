    function funcDropdown() {
      document.getElementById("myDropdown").classList.toggle("showss");
    }

    $(document).ready(function(){

      $.ajax({
        url: 'writter',
        type: 'GET',
        dataType: 'json',
      })
      .done(function(data) {
        var json = $.parseJSON(data);
    // for (var i=0;i<json.length;++i)
  //       {
  //           console.log(json[i].message);
  //       }
  console.log(json.message);
})
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });

      $("#author_this_week").html("<li class='media baboocontent'><img alt='Name' class='d-flex mr-3 rounded-circle' src='public/img/profile/pp_wanita2.png' width='50'><div class='media-body mt-7'><h5 class='mt-0 mb-1 nametitle'>Rian</h5><small>Fiksi</small><div class='pull-right baboocolor'><a href='#' class='addbutton'><img src='public/img/assets/icon_plus_purple.svg' width='20' class='mt-img'></a></div></div></li>");


      var window_width = $( window ).width();

      if (window_width < 768) {
        $(".stickymenu").trigger("sticky_kit:detach");
      } else {
        make_sticky();
      }

      $( window ).resize(function() {

        window_width = $( window ).width();

        if (window_width < 768) {
          $(".stickymenu").trigger("sticky_kit:detach");
        } else {
          make_sticky();
        }

      });

      function make_sticky() {
        $(".stickymenu").stick_in_parent();
      }

    });