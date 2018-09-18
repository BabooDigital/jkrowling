$(document).ready(function() {

});
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
