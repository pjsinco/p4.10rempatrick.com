(function() {
  // get gameId from url
  var url = window.location.href.split('/');
  var gameId = url[url.length - 1]; 

  // a gameplay button is clicked, so update stats, display  
  $("button[class!='substitute']").click(function(event){
    var stat = 
      $(event.target).attr('class').split(' ')[1]; // chop off 'play'

    // get player's id
    var playerId = 
      $(event.target).parent().parent().attr('id').split('-');
    playerId = playerId[playerId.length - 1];
  
    $(event.target).parent().parent().effect('highlight');
  
    $.ajax({
      type: 'POST',
      url: '/player/p_increment_stat/' + gameId + '/' +
        playerId + '/' + stat,
      success: function(response) {
        console.log(response);
        var data = $.parseJSON(response);
        $('div#player-' + playerId)
          .children(':first')
          .html(data.player_points + '<span> pts</span>');
        $('#' + data.team_id + '-score').html(data.team_points);

        // if stat is personal foul, update team fouls on scoreboard
        if (stat.localeCompare('pf') == 0) { 
          $('#' + data.team_id + '-fouls span')
            .first()
            .html(data.team_fouls);
        };
      }
    });
  });
})();
