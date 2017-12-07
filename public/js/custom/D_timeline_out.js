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
});