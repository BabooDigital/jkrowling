$(document).ready(function(){
      $.ajax({
        url: 'writters',
        type: 'GET',
        dataType: 'json',
      })
      .done(function(data) {
        var json = $.parseJSON(data);
        var datas = "";
        $.each(json.data, function(i, item) {
           // console.log(item.author_name);
           datas += "<li class='media baboocontent'><img alt='aa' class='d-flex mr-3 rounded-circle' src='"+item.avatar+"' width='50' height='50'><div class='media-body mt-7'><h5 class='mt-0 mb-1 nametitle'>"+item.author_name+"</h5><small>Fiksi</small><div class='pull-right baboocolor'><a href='#' class='addbutton'><img src='public/img/assets/icon_plus_purple.svg' width='20' class='mt-img'></a></div></div></li>";
        });
      $("#author_this_week").html(datas);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });

      var page = 1;
      $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() > $(document).height() - 200) {
          page++;
          loadMoreData(page);
        }
      });

      function loadMoreData(page){
        $.ajax(
        {
          url: '?page=' + page,
          type: "get",
          beforeSend: function()
          {
            $('.loader').show();
          }
        })
        .done(function(data)
        {
          if(data == " "){
            $('.loader').html("No more records found");
            return;
          }
          $('.loader').hide();
          $("#post-data").append(data);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
          alert('server not responding...');
        });
      }
});