$(".t-row").mouseenter(function() {
    $(this).addClass( "t-row-hover" );
});

$(".t-row").mouseout(function() {
    $(this).toggleClass("t-row-hover");
});