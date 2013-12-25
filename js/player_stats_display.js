(function() {
  var playerId, gameId

  // get game_id
  var url = window.location.href.split('/');
  var gameId = url[url.length - 1]; 

  // ajaxify tooltip content: 
  //http://stackoverflow.com/questions/13175268
  //    /ajax-content-in-a-jquery-ui-tooltip-widget
  $('.get-stats').tooltip({
    content: 'waiting ...',
    position: {
      my: 'center',
      at: 'right'
    },
    open: function(event, ui) {
      var elem = $(this);
      var stats;

      // get player_id
      var idTarget = $(event.target)
        .parent()
        .parent()
        .attr('id')
        .split('-');
      playerId = idTarget[idTarget.length - 1];

      $.ajax('/player/p_stats_display/'
        + gameId + '/' + playerId).always(function(response){
          var playerStats = $.parseJSON(response);
        
          console.log(playerStats);
  
          //var statLine = playerStats.FGM;
          var statLine = "<div class='tooltip-table'>"
            + '<strong>FGM-A:</strong> ' + playerStats['FGM'] 
            + '/' + playerStats['FGA']
            + '<br>' 
            + '<strong>3PM-A</strong>: ' + playerStats['3PM'] 
            + '/' + playerStats['3PA']
            + '<br>' 
            + '<strong>FTM-A</strong>: ' + playerStats['FTM'] 
            + '/' + playerStats['FTA']
            + '<br>' 
            + '<strong>REB:</strong> ' + playerStats['REB'] 
            + '<br>' 
            + '<strong>AST:</strong> ' + playerStats['AST'] 
            + '<br>' 
            + '<strong>PF:</strong> ' + playerStats['PF'] 
            + '</div>';

             //+ '/' + playerStats.3PA
            //+ '<br>'
            //+ 'FT-A: ' + playerStats.FTM + '/' + playerStats.FTA
            //+ '<br>'
      
          //var statTable = '<div class=\'tooltip-table\'>'
          //  + '<table class=\'player-stats\'>'
          //  + '<tr>'
          //  + '<th>FGM-A</th>'
          //  + '<th>3PM-A</th>'
          //  + '<th>FTM-A</th>'
          //  + '<th>REB</th>'
          //  + '<th>AST</th>'
          //  + '<th>PF</th></tr>'
          //  + '<tr>'
          //  + '<td>' + playerStats['FGM'] + '/' 
          //  + playerStats['FGA'] + '</td>'
          //  + '<td>' + playerStats['3PM'] + '/' 
          //  + playerStats['3PM'] + '</td>'
          //  + '<td>' + playerStats['FTM'] + '/' 
          //  + playerStats['FTA'] + '</td>'
          //  + '<td>' + playerStats['REB'] + '</td>'
          //  + '<td>' + playerStats['AST'] + '</td>'
          //  + '<td>' + playerStats['PF'] + '</td>'
          //  + '</tr></table></div>';
          //console.log(statTable);

          elem.tooltip('option', 'content', statLine);

        });
    }
  });
})();
