$(document).ready(function(){load_notification();count_notif();setInterval(count_notif,1E4);$("#btn_notif_comment").on("click",function(b){var d=$(this).attr("ntf");$(this).attr("href");$.ajax({url:"updatentf",type:"POST",dataType:"",data:{ntf:d}}).done(function(d){console.log("success")}).fail(function(){console.log("error")}).always(function(){console.log("complete")});b.preventDefault()})});
$("#btn_notif_comment").on("click",function(b){var d=$(this).attr("ntf");$(this).attr("href");$.ajax({url:"updatentf",type:"POST",dataType:"",data:{ntf:d}}).done(function(d){console.log("success")}).fail(function(){console.log("error")}).always(function(){console.log("complete")});b.preventDefault()});
function count_notif(){$.ajax({url:base_url+"notification",type:"POST",dataType:"json"}).done(function(b){var d=0;$.each(b,function(f,g){"unread"==g.notif_status&&d++});$("#noti_Counter").css({opacity:0}).text(d).css({top:"-10px",opacity:1})}).fail(function(){console.log("error")}).always(function(){})}
function load_notification(){$("#noti_Button").click(function(){$("#notifications").show();$("#notifications").show("slow/400/fast",function(){$.ajax({url:base_url+"notification",type:"POST",dataType:"json"}).done(function(b){var d="",f="";$("#loader_notif").hide();$.each(b,function(g,a){if(1==a.notif_type.notif_type_id){var c="";"read"==a.notif_status&&(c+="style='background:#ddd;'");f=null==a.notif_user.prof_pict||""==a.notif_user.prof_pict||"Kosong"==a.notif_user.prof_pict?base_url+"public/img/icon-tab/empty-set.png":
a.notif_user.prof_pict;d+='<a class="list-group-item list-group-item-action flex-column align-items-start btn_notif_follow" '+c+' id="btn_notif_follow" ntf="'+a.notif_id+'"> <div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> <img class="d-flex align-self-start mr-20 rounded-circle" src="'+f+'" width="48" alt="Generic placeholder image"> <div class="media-body mt-5"> <span class="nametitle2">'+a.notif_user.fullname+'</span> <br> <span class="text-muted fontkecil">Mulai mengikuti tulisan anda</span><span class="button_follow"><p class="text-muted fontkecil">1 hours ago</p></small></p> </div> </div> </div> </a>'}else if(2==
a.notif_type.notif_type_id){c="";"read"==a.notif_status&&(c+="style='background:#ddd;'");f=null==a.notif_user.prof_pict||""==a.notif_user.prof_pict||"Kosong"==a.notif_user.prof_pict?base_url+"public/img/icon-tab/empty-set.png":a.notif_user.prof_pict;var e="";e=null!=a.notif_book.title_book||""!=a.notif_book.title_book||"undefined"!=a.notif_book.title_book?e+a.notif_book.title_book:e+"kosong";var b;""==a.notif_book.cover_url&&(b="");null!=a.notif_book.cover_url?b='<object data="" style="width:100%;background-image:url('+
a.notif_book.cover_url+');"></object>':null==a.notif_book.cover_url&&(b="");d+='<a href="'+base_url+"book/"+a.notif_book.book_id+"-"+convertToSlug(e)+'#comment" class="list-group-item list-group-item-action flex-column align-items-start btn_notif_comment" '+c+' id="" ntf="'+a.notif_id+'"> <div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> <img class="d-flex align-self-start mr-20 rounded-circle" src="'+f+'" width="48" alt="Generic placeholder image"> <div class="media-body mt-5"> <span class="nametitle2">'+
a.notif_user.fullname+'</span> <span class="text-muted fontkecil">Mengomentari tulisan anda</span><span class="button_follow"> </div> </div> </div> <div class="row" style="padding: 0px 10px 0px 10px;"> <div class="media" style="width:100%;"> '+b+' </div> <h5 style="padding-top:20px; font-weight: 500;"><b>'+a.notif_book.title_book+"</b></h5> </div> </a>"}else 3==a.notif_type.notif_type_id?(c="","read"==a.notif_status&&(c+="style='background:#ddd;'"),f=null==a.notif_user.prof_pict||""==a.notif_user.prof_pict||
"Kosong"==a.notif_user.prof_pict?base_url+"public/img/icon-tab/empty-set.png":a.notif_user.prof_pict,e="",e=null!=a.notif_book.title_book||""!=a.notif_book.title_book||"undefined"!=a.notif_book.title_book?e+a.notif_book.title_book:e+"kosong",d+='<a href="'+base_url+"book/"+a.notif_book.book_id+"-"+convertToSlug(e)+'" class="list-group-item list-group-item-action flex-column align-items-start btn_notif_like" '+c+' id="btn_notif_like" ntf="'+a.notif_id+'"> <div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> <img class="d-flex align-self-start mr-20 rounded-circle" src="'+
f+'" width="48" alt="Generic placeholder image"> <div class="media-body mt-5"> <span class="nametitle2">'+a.notif_user.fullname+'</span> <span class="text-muted fontkecil">Menyukai buku anda</span><span class="button_follow"> </div> </div> </div> <div class="row" style="padding: 0px 10px 0px 10px;"> <div class="media"> <img src="'+a.notif_book.cover_url+'" style="width: 100%;"> </div> <h5 style="padding-top:20px; font-weight: 500;"><b>'+a.notif_book.title_book+"</b></h5> </div> </a>"):(e="",e=null!=
a.notif_book.title_book||""!=a.notif_book.title_book||"undefined"!=a.notif_book.title_book?e+a.notif_book.title_book:e+"kosong",f=null==a.notif_user.prof_pict||""==a.notif_user.prof_pict||"Kosong"==a.notif_user.prof_pict?base_url+"public/img/icon-tab/empty-set.png":a.notif_user.prof_pict,b="",$.isEmptyObject(a.notif_user)&&(b+="System"),c="","read"==a.notif_status&&(c+="style='background:#ddd;'"),d+='<a href="'+base_url+"book/"+a.notif_book.book_id+"-"+convertToSlug(e)+'" class="list-group-item list-group-item-action flex-column align-items-start btn_notif_publish" '+
c+' id="" ntf="'+a.notif_id+'"> <div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> <img class="d-flex align-self-start mr-20 rounded-circle" src="'+f+'" width="48" alt="Generic placeholder image"> <div class="media-body mt-5"> <span class="nametitle2">'+b+'</span> <br> <span class="text-muted fontkecil">Buku anda sudah publish</span><span class="button_follow"> <img class="img_follow" src="public/img/icon-tab/add_follow.svg"> </span> <p class="text-muted fontkecil">'+
a.notif_time+"</p></small></p> </div> </div> </div> </a>")});$("#notification").html(d);$(".btn_notif_comment").on("click",function(b){var a=$(this).attr("ntf"),c=$(this).attr("href");$.ajax({url:"updatentf",type:"POST",dataType:"",data:{ntf:a}}).done(function(a){console.log("success");window.location.href=c}).fail(function(){console.log("error")}).always(function(){});b.preventDefault()});$(".btn_notif_like").on("click",function(b){var a=$(this).attr("ntf"),c=$(this).attr("href");$.ajax({url:"updatentf",
type:"POST",dataType:"",data:{ntf:a}}).done(function(a){window.location.href=c}).fail(function(){console.log("error")}).always(function(){});b.preventDefault()});$(".btn_notif_publish").on("click",function(b){var a=$(this).attr("ntf"),c=$(this).attr("href");$.ajax({url:"updatentf",type:"POST",dataType:"",data:{ntf:a}}).done(function(a){window.location.href=c}).fail(function(){console.log("error")}).always(function(){});b.preventDefault()});$(".btn_notif_follow").on("click",function(b){var a=$(this).attr("ntf"),
c=$(this).attr("href");$.ajax({url:"updatentf",type:"POST",dataType:"",data:{ntf:a}}).done(function(a){window.location.href=c}).fail(function(){console.log("error")}).always(function(){});b.preventDefault()})}).fail(function(){console.log("error")}).always(function(){console.log("complete")})});$("#noti_Counter").fadeOut("slow");return!1});$(document).click(function(){$("#notifications").hide();$("#noti_Counter").is(":hidden")})};