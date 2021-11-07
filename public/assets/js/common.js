// ---- Event handlers ----

//When mouse hovers over a list item, turn it's background to a different color
$(".t-row").mouseenter(function() {
    $(this).addClass( "t-row-hover" );
});

$(".t-row").mouseout(function() {
    $(this).toggleClass("t-row-hover");
});


// ---- Functions ----

//When switching from one page to another in the same view, hide the last one and show the current one
function showElement(pageFrom, pageTo) {
    pageFrom.css("display", "none");
    pageTo.css("display", "block");
}