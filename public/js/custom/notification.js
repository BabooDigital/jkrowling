$(document).ready(function () {
    load_notification();
    count_notif();
    $(document).on('click', '#btn_notif_upd',function() {
        var ntf = $(this).attr('ntf');
        var slug = $(this).attr('href');
        $.ajax({
            url: 'updatentf',
            type: 'POST',
            dataType: 'json',
            data: {ntf: ntf,csrf_test_name: csrf_value},
        })
            .done(function() {
            })
            .fail(function() {
            })
            .always(function() {
            });

    });
});
function count_notif() {
    $.ajax({
        url: base_url+'notifupdate',
        type: 'POST',
        dataType: 'json',
        data: {csrf_test_name: csrf_value},
    })
        .done(function(data) {
            var datas = "";
            var user = "";
            var count_unread = 0;
            $.each(data, function(index, val) {
                if (val.notif_status == "unread") {
                    count_unread++;
                }
            });
            if (count_unread == 0) {
                $('#noti_Counter')
                    .css({ opacity: 0 })
                    .text(count_unread)
                    .css({opacity: 1, display: 'none'  });
            }else{
                $('#noti_Counter')
                    .css({ opacity: 0 })
                    .text(count_unread)
                    .css({opacity: 1, display: 'block'  });
            }
        })
        .fail(function() {
            // console.log("error");
        })
        .always(function() {
        });
}
function load_notification() {
    $('#noti_Button').click(function () {
        $('#notifications').toggle('slow/00/fast', function () {
            $.ajax({
                url: base_url+'notifupdate',
                type: 'POST',
                dataType: 'json',
                data: {csrf_test_name: csrf_value},
            })
                .done(function(data) {
                    var datas = "";
                    var user = "";
                    $("#loader_notif").hide();
                    if (data.length !== 0){

                        $.each(data, function(index, val) {
                            // console.log(val);
                            if (val.notif_type.notif_type_id == 1) {
                                var add_style = "";
                                if (val.notif_status == "read") {
                                    add_style += "style='background:#f1f1f1;'";
                                }
                                if (val.notif_user.prof_pict == null || val.notif_user.prof_pict == '' || val.notif_user.prof_pict == 'Kosong') {
                                    user = base_url+'public/img/profile/blank-photo.jpg';
                                }else{
                                    user = val.notif_user.prof_pict;
                                }
                                datas += "<a href='"+base_url+'penulis/'+val.notif_user.user_id+'-'+convertToSlug(val.notif_user.fullname)+"' data-usr-prf='"+val.notif_user.user_id+"' data-usr-name='"+val.notif_user.fullname+"' class='text-left list-group-item list-group-item-action align-items-start btn_notif_like' "+add_style+" id='btn_notif_upd' ntf='"+val.notif_id+"' style='text-align:  left; '> <div class='row'><div><img alt='Follow you' class='mr-5' height='25' src='"+base_url+"public/img/assets/notif_follow.png' width='25'> <img alt='"+val.notif_user.fullname+"' class='mr-10 rounded-circle' height='35' src='"+user+"' width='35' style='object-fit:  cover; '></div> <div class='media-body'><p style='margin-bottom: -5px !important;line-height: 15px;'><span style='font-size: 11pt; '><b>"+val.notif_user.fullname+"</b> "+val.notif_text+"</span></p><span class='text-muted' style='font-size:  8pt; '>"+val.notif_time+"</span></div></div> </a>";
                            }else if(val.notif_type.notif_type_id == 2){
                                var add_style = "";
                                if (val.notif_status == "read") {
                                    add_style += "style='background:#f1f1f1;'";
                                }
                                // console.log("comment");
                                if (val.notif_user.prof_pict == null || val.notif_user.prof_pict == '' || val.notif_user.prof_pict == 'Kosong') {
                                    user = base_url+'public/img/profile/blank-photo.jpg';
                                }else{
                                    user = val.notif_user.prof_pict;
                                }
                                var title = "";
                                if (val.notif_book.title_book != null || val.notif_book.title_book != '' || val.notif_book.title_book != 'undefined') {
                                    title += val.notif_book.title_book;
                                }else{
                                    title += "kosong";
                                }
                                var object;
                                if (val.notif_book.cover_url == "") {
                                    object = '';
                                }if (val.notif_book.cover_url != null) {
                                    object = '<object data="" style="width:100%;background-image:url('+val.notif_book.cover_url+');"></object>';
                                }
                                else if (val.notif_book.cover_url == null){
                                    object = '';
                                }
                                datas += "<a href='"+base_url+'penulis/'+$('#uid_sess').val()+'-'+convertToSlug($('#name_sess').val())+'/'+val.notif_book.book_id+'-'+convertToSlug(val.notif_book.title_book)+"' class='list-group-item list-group-item-action align-items-start' "+add_style+" id='btn_notif_upd' ntf='"+val.notif_id+"'> <div class='row'><div><img alt='Follow you' class='mr-5' height='25' src='"+base_url+"public/img/assets/notif_comment.png' width='25'> <img alt='"+val.notif_user.fullname+"' class='mr-10 rounded-circle' height='35' src='"+user+"' width='35' style='object-fit:  cover; '></div> <div class='media-body' style='text-align:  left !important;'><p style='margin-bottom: -5px !important;line-height: 15px;'><span style='font-size: 11pt; '><b>"+val.notif_user.fullname+"</b> "+val.notif_text+"</span></p><span style='font-size:  8pt; 'class='text-muted'>"+val.notif_time+"</span></div><div class='mt-5'><img src='"+val.notif_book.cover_url+"' style='width: 100%;height:100px;object-fit:cover;'></div></div> </a>";
                            }else if(val.notif_type.notif_type_id == 3){
                                var add_style = "";
                                if (val.notif_status == "read") {
                                    add_style += "style='background:#f1f1f1;'";
                                }
                                // console.log("likes");
                                if (val.notif_user.prof_pict == null || val.notif_user.prof_pict == '' || val.notif_user.prof_pict == 'Kosong') {
                                    user = base_url+'public/img/profile/blank-photo.jpg';
                                }else{
                                    user = val.notif_user.prof_pict;
                                }
                                var title = "";
                                if (val.notif_book.title_book != null || val.notif_book.title_book != '' || val.notif_book.title_book != 'undefined') {
                                    title += val.notif_book.title_book;
                                }else{
                                    title += "kosong";
                                }
                                datas += "<a href='"+base_url+'penulis/'+$('#uid_sess').val()+'-'+convertToSlug($('#name_sess').val())+'/'+val.notif_book.book_id+'-'+convertToSlug(val.notif_book.title_book)+"' class='list-group-item list-group-item-action align-items-start btn_notif_like' "+add_style+" id='btn_notif_upd' ntf='"+val.notif_id+"' style='text-align:  left !important;'> <div class='row'><div><img alt='Like you' class='mr-5' height='25' src='"+base_url+"public/img/assets/notif_like.png' width='25'> <img alt='"+val.notif_user.fullname+"' class='mr-10 rounded-circle' height='35' src='"+user+"' width='35' style='object-fit:  cover; '></div> <div class='media-body text-left'><p style='margin-bottom: -5px !important;line-height: 15px;'><span style='font-size: 11pt; '><b>"+val.notif_user.fullname+"</b> "+val.notif_text+"</span></p><span style='font-size:  8pt; 'class='text-muted'>"+val.notif_time+"</span></div><div class='mt-5'><img src='"+val.notif_book.cover_url+"' style='width: 100%;height:100px;object-fit:cover;'></div></div> </a>";
                            }else if(val.notif_type.notif_type_id == 4){
                                if (val.notif_user.prof_pict == null || val.notif_user.prof_pict == '' || val.notif_user.prof_pict == 'Kosong') {
                                    user = base_url+'public/img/profile/blank-photo.jpg';
                                }else{
                                    user = val.notif_user.prof_pict;
                                }
                                var user_name = "";
                                if ($.isEmptyObject(val.notif_user.fullname)) {
                                    user_name += "Baboo";
                                }
                                // console.log("publish");
                                var add_style = "";
                                if (val.notif_status == "read") {
                                    add_style += "style='background:#f1f1f1;'";
                                }
                                datas += '<a href="'+base_url+'penulis/'+$('#uid_sess').val()+'-'+convertToSlug($('#name_sess').val())+'/'+val.notif_book.book_id+'-'+convertToSlug(val.notif_book.title_book)+'" class="list-group-item list-group-item-action flex-column align-items-start btn_notif_publish" '+add_style+' id="" ntf="'+val.notif_id+'" id="btn_notif_upd"> <div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> <div class="media-body"> <span class="nametitle2"></span> <br> <p class="" style="margin-bottom:-5px !important;">'+val.notif_text+'</p> <span class="text-muted" style="font-size:  8pt;">'+val.notif_time+'</span></div> </div> </div> </a>';
                            }else if(val.notif_type.notif_type_id == 5){
                                var add_style = "";
                                if (val.notif_status == "read") {
                                    add_style += "style='background:#f1f1f1;'";
                                }
                                datas += '<a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column align-items-start btn_notif_publish" '+add_style+' id="btn_notif_upd" ntf="'+val.notif_id+'"> <div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> <div class="media-body"> <span class="nametitle2"></span> <br> <p class="" style="margin-bottom:-5px !important;">'+val.notif_text+'</p> <span class="text-muted" style="font-size:  8pt;">'+val.notif_time+'</span></div> </div> </div> </a>';
                            }else if(val.notif_type.notif_type_id == 6){
                                var add_style = "";
                                if (val.notif_status == "read") {
                                    add_style += "style='background:#f1f1f1;'";
                                }
                                datas += '<a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column align-items-start btn_notif_publish" '+add_style+' id="btn_notif_upd" ntf="'+val.notif_id+'"> <div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> <div class="media-body"> <span class="nametitle2"></span> <br> <p class="" style="margin-bottom:-5px !important;">'+val.notif_text+'</p> <span class="text-muted" style="font-size:  8pt;">'+val.notif_time+'</span></div> </div> </div> </a>';
                            }
                            // console.log(val.notif_user);
                        });
                    }else{
                        datas += "<div><img src='"+base_url+"/public/img/icon_notification.png' class='mr-30' width='150'><p class='mt-15'>Tidak Aktivitas Pemberitahuan</p></div>";
                    }
                    $("#notification").html(datas);
                })
                .fail(function() {
                    // console.log("error");
                })
                .always(function() {
                    // console.log("complete");
                });

        });

        $('#noti_Counter').fadeOut('slow');

        return false;
    });
    $(document).click(function () {
        $('#notifications').hide();

        if ($('#noti_Counter').is(':hidden')) {
        }
    });
}

function convertToSlug(e) {
    return e.toLowerCase().replace(/[^\w ]+/g, "").replace(/ +/g, "-")
}
