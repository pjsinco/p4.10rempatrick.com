// get gameId from url
var url = window.location.href.split('/');
var gameId = url[url.length - 1]; 

$("button[class!='substitute']").click(function(event){
  console.log(event.target);
  var stat = $(event.target).attr('class').split(' ')[1]; // chop off 'play'
  var playerId = $(event.target).parent().parent().attr('id').split('-');
  playerId = playerId[playerId.length - 1];
  console.log(stat + ': ' + playerId);

  $(event.target).parent().parent().effect('highlight');

  $.ajax({
    type: 'POST',
    url: '/player/p_increment_stat/' + gameId + '/' +
      playerId + '/' + stat,
    success: function(response) {
      console.log(response);
      var data = $.parseJSON(response);
      $('div#player-' + playerId).children(':first').html(data.player_points + '<span> pts</span>');
      $('#' + data.team_id + '-score').html(data.team_points);
      //location.reload();
    }
  });
  

});
