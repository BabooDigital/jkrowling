$(document).ready(function(){var b=null;$(document.body).on("mousemove",function(a){b&&b.offset({top:a.pageY,left:a.pageX})});$(document.body).on("mousedown","#title_book",function(a){console.log("drag")});$(document.body).on("mouseup",function(a){b=null})});