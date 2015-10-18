$(function() {
    // Run the clock
    function timer() {
        var t = new Date();
        $('.system-datetime').html(t.format('default'));
        $('.triangle-time').html(t.format('trianglenineTime'));
        $('.trianglenine-date').html(t.format('trianglenineDate'));
    }
    setInterval(timer, 1000);
    timer();

    prettyPrint();
});