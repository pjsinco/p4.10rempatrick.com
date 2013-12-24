(function() {
  var playerId, gameId

  // get game_id
  var url = window.location.href.split('/');
  var gameId = url[url.length - 1]; 

  function getPlayerStats() {
    var stats;
    // get player_id
    var idTarget = $(event.target)
      .parent()
      .parent()
      .attr('id')
      .split('-');
    playerId = idTarget[idTarget.length - 1];

    $.ajax({
      type: 'POST',
      url: '/player/p_stats_display/' 
        + gameId + '/'
        + playerId,
      success: function(response) {
        stats = response;
      }
    });

    return stats; 
  }

  
  
  $(function() {
    $('.get-stats').tooltip();
  });
  
  // initialize tooltip
  //$('.get-stats').tooltip({
    //content: eval(getPlayerStats)
  //});

  // getter
  //var content = $('.get-stats').tooltip('option', 'content');

  // setter
  //$('.get-stats').tooltip('option', 'content', eval(getPlayerStats));

  $(".get-stats").on('mouseover', function(event) {
    // get player_id
    var idTarget = $(event.target)
      .parent()
      .parent()
      .attr('id')
      .split('-');
    playerId = idTarget[idTarget.length - 1];

    $.ajax({
      type: 'POST',
      url: '/player/p_stats_display/' 
        + gameId + '/'
        + playerId,
      success: function(response) {
        $(event.target).attr('title', response);
      }
    });
  });


  console.log(content);
  
  $(document).ready(function() {
    $.ajax({
      type: 'POST',
      url: '/player/p_stats_display/' 
        + gameId + '/'
        + playerId,
      success: function(response) {
        $(event.target).attr('title', response);
      }
    });
  });
})();
