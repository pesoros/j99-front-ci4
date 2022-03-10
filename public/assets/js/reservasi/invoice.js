var ONE_HOUR = 120 * 60 * 1000;
// Set the date we're counting down to
var thisdate = new Date().getTime();
var countDownDate = new Date( thisdate + ONE_HOUR);

// Update the count down every 1 second
var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("countdow").innerHTML =  hours + " : "
    + minutes + " : " + seconds;

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("countdow").innerHTML = "EXPIRED";
    }
}, 1000);

$( document ).ready(function() {
    $(".w-accordion-menu").on("click", function (event) {
        event.preventDefault();
        $(".w-accordion-content").slideUp();
        $(".w-accordion-menu").children().children("i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
        if ($(this).next().is(":visible")) {
            $(this).children().children("i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
        } else {
            $(this).next().slideDown();
            $(this).children().children("i").removeClass("fa-chevron-down").addClass("fa-chevron-up");
        }
    });
    $(".w-accordion-menu").first().click();
});