(function() {
  var idTarget;
  var playerId;
  var playerIndex;
  var targetId;
  
  $('.ui-icon-circle-triangle-e').click(function(event) {
    idTarget = $(event.target)
      .parent()
      .parent()
      .attr('id')
      .split('-');
  
    playerId = idTarget[idTarget.length - 1];
    playerIndex = idTarget[idTarget.length - 2];
    targetId = 'player-' + playerIndex + '-' + playerId
    $('#' + targetId).animate({
      height: '101px'
      }, 300, function(){
      $(event.target).attr('class', 'sub ui-icon ui-icon-closethick');
      $("span[class*='closethick']").click(function(event) {
        $("li[id$='" + playerId + "']").children().eq(4).hide(300);
        $('#' + targetId).animate({
          height: '78px'
        }, 300, function() {
          $(event.target).attr('class', 
            'sub ui-icon ui-icon-circle-triangle-e');
          location.reload();
        });
      });
    });
    $("li[id$='" + playerId + "']").children().eq(4).show(300);
  });
  
  $('.substitute').click(function(event) {
  
    // get gameId from url
    var url = window.location.href.split('/');
    var gameId = url[url.length - 1]; 
  
    var playerIn = event.target
      .previousSibling
      .previousSibling
      .previousSibling
      .previousSibling;
    playerIn = playerIn.options[playerIn.selectedIndex].value;
    var playerOut = playerId;
  
    $.ajax({
      type: 'POST',
      url: '/team/p_substitute/' 
        + gameId + '/' + playerOut + '/' + playerIn 
        + '/' + playerIndex,
      success: function(response) {
        $("li[id$='-" + playerOut + "']").
          replaceWith("<li class='player-card' title='" + response + '"'
            + playerIn + "' id='player-" + playerIndex + "-" 
            + playerIn + "'>");
        location.reload();
      }
    });
  });
})();
