$(document).ready(function() {
	function showPopUpBanner() {
        $('.popUpBannerBox').fadeIn("2000");
    }
    setTimeout(showPopUpBanner, 3000);

    $('.closeButton').click(function() {
        $('.popUpBannerBox').fadeOut("2000");
        return false;
    });
    getWritters();
});

function getWritters() {
    function f(c) {
        $.ajax({
            url: "?page=" + c,
            type: "get",
            beforeSend: function() {
                $(".loader").show()
            }
        }).done(function(b) {
            " " == b ? $(".loader").html("No more records found") : ($(".loader").hide(), $("#post-data").append(b))
        }).fail(function(b, c, a) {
            console.log("server not responding...")
        })
    }
    // $.ajax({
    //     url: "writters",
    //     type: "GET",
    //     dataType: "json",
    //     beforeSend : function() {
    //         $('.loader').show();
    //     }
    // }).done(function(c) {
    //     var b = "";
    //     $.each(c, function(c, a) {
    //         if (null != a.avatar) var d = a.avatar;
    //         "" == a.avatar ? d = "public/img/profile/blank-photo.jpg" : null == a.avatar && (d =
    //             "public/img/profile/blank-photo.jpg");
    //         b += "<a href='" + base_url + "profile/" + a.author_id + "'><li class='media baboocontent'><img alt='" + a.author_name + "' class='d-flex mr-3 rounded-circle' src='" + d + "' width='50' height='50'><div class='media-body mt-7'><h5 class='mt-0 mb-1 nametitle'>" + a.author_name + "</h5><small>Fiksi</small><div class='pull-right baboocolor'><a href='#' class='addbutton'><img src='public/img/assets/icon_plus_purple.svg' width='20' class='mt-img'></a></div></div></li></a>"
    //     });
    //     $("#author_this_week").html(b)
    // }).fail(function() {
    //     console.log("error")
    // }).always(function() {});

    loaded = true;
    var page = 2;
    $(window).scroll(function() {
        if  ($(window).scrollTop() + $(window).height() >= $(document).height() - 100 && loaded){
          loadMoreData(page)
          page++;
      }
  });

    function loadMoreData(page) {
        loaded = false;
        $.ajax({
          url: '?page=' + page,
          type: "get",
          beforeSend: function() {
            $('.loader').show();
        }
    })
        .done(function(data) {
          if (!$.trim(data)) {
            $('.loader').hide();
            $('#post-data').append("<div class='col-md-12 mb-30 text-center'>Tidak ada data lagi..</div>");
            return;

        };
        $('.loader').hide();
        $("#post-data").append(data);
        loaded = true;
    })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
          console.log('server not responding...');
          loaded = true;
      });
    }
};
