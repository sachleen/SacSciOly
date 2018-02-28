// Code from https://stackoverflow.com/a/9335296/219118

function CountDownTimer(dt, id, format, finish)
{
    var end = new Date(dt);

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            document.getElementById(id).innerHTML = finish;

            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        document.getElementById(id).innerHTML = days + 'days ';
        document.getElementById(id).innerHTML += hours + 'hrs ';
        document.getElementById(id).innerHTML += minutes + 'mins ';
        document.getElementById(id).innerHTML += seconds + 'secs';
        
        document.getElementById(id).innerHTML = format.formatUnicorn(days, hours, minutes, seconds);
    }

    timer = setInterval(showRemaining, 1000, format, finish);
}
// CountDownTimer("03/03/2018 8:00 AM", "regional-countdown", "{0} Days {1} Hours {2} Minutes {3} Seconds", "Expired!");