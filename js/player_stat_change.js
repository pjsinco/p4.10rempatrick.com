// get gameId from url
var url = window.location.href.split('/');
var gameId = url[url.length - 1]; 

$("button[class!='substitute']").click(function(event){
  //console.log(event.target);
  var stat = $(event.target).attr('class');
  var playerId = $(event.target).parent().parent().attr('id').split('-');
  playerId = playerId[playerId.length - 1];
  console.log(stat + ': ' + playerId);

  $.ajax({
    type: 'POST',
    url: '/player/p_increment_stat/' + gameId + '/' +
      playerId + '/' + stat,
    success: function(response) {
      console.log(response);
      location.reload();
    }
  });
  

});
