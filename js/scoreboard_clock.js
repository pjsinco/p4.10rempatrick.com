// help from:
// https://mindgrader.com/tutorials/1-how-to-create-a-simple-javascript-countdown-timer

var QUARTER_LENGTH = 12; // duration in minutes
var secondsTotal = QUARTER_LENGTH * 60;
var minutes = secondsTotal / 60;
var seconds = secondsTotal % 60;
var clock;

function updateClock() {
  // prepend 0 to values below 10
  // http://stackoverflow.com/questions/8169785/how-to-prepend-a-zero-in-front-of-any-number-below-10-in-javascript-using-regexp
  $('#clock').html(
    ('0' + String(minutes)).slice(-2) + ':' + 
    ('0' + String(seconds)).slice(-2)
  );
}

function startClock() {
  clock = window.setInterval(function() {
    secondsTotal -= 1;
    updateClock();
    
    var seconds_left = secondsTotal;
    minutes = parseInt(seconds_left / 60);
    seconds = parseInt(seconds_left % 60);

    if (seconds_left == 0) {
      return;
    }

  }, 1000);
}

function stopClock() {
  window.clearInterval(clock);
};

/*
 * EVENT LISTENERS
 */
$('document').ready(function() {
  updateClock();
});

$('#get-time').click(function() {
  var time = document.getElementById('clock');
  console.log(time.innerHTML);
});

$('#start').click(function() {
  startClock();
});

$('#stop').click(function() {
  stopClock();
});
