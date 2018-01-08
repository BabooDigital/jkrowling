$(document).ready(function() {
    var $dragging = null;

    $(document.body).on("mousemove", function(e) {
        if ($dragging) {
            $dragging.offset({
                top: e.pageY,
                left: e.pageX
            });
        }
    });
    
    $(document.body).on("mousedown", "#title_book", function (e) {
        // $dragging = $(e.target);
        console.log('drag');
    });
    
    $(document.body).on("mouseup", function (e) {
        $dragging = null;
    });
});