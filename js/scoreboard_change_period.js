(function() {
  var change;  

  // get gameId from url
  var url = window.location.href.split('/');
  var gameId = url[url.length - 1]; 

  $('.period-change').click(function(event) {
    change = $(event.target).attr('class').split(' ');
    change = change[change.length - 1];
    //console.log(change);

    $.ajax({
      type: 'POST',
      url: '/scoreboard/p_change_period/' 
        + gameId + '/' 
        + ((change.localeCompare('increment') == 0) ? 'true' : 'false'),
      success: function(response) {
        //console.log(response);
        //console.log(change);
        $('div#period span').eq(1).html(response);
      }
    });
  });
})();
