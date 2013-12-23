//$('.bench').change(function(){
//console.log($('select option:selected').val());
//});


$('.ui-icon-circle-triangle-e').click(function(event) {
  var idTarget =
      $(event.target).parent().parent().attr('id').split('-');

  var playerId = idTarget[idTarget.length - 1];
  var playerIndex = idTarget[idTarget.length - 2];
  var targetId = 'player-' + playerIndex + '-' + playerId
  $('#' + targetId).animate({
    height: '106px'
  }, 300, function(){
    //$(event.target).removeClass('ui-icon-circle-triangle-e').addClass('ui-icon-closethick');
    $(event.target).attr('class', 'sub ui-icon ui-icon-closethick');
    $("span[class*='closethick']").click(function(event) {
      $("li[id$='" + playerId + "']").children().eq(4).hide(300);
      $('#' + targetId).animate({
        height: '72px'
      }, 300, function() {
        $(event.target).attr('class', 'sub ui-icon ui-icon-circle-triangle-e');
        location.reload();
      });
    });
  });
  $("li[id$='" + playerId + "']").children().eq(4).show(300);
});


//$('.substitute').click(function(event) {
//
//  // get gameId from url
//  var url = window.location.href.split('/');
//  var gameId = url[url.length - 1]; 
//
//  var playerIn = event.target.previousSibling.previousSibling.previousSibling.previousSibling;
//  playerIn = playerIn.options[playerIn.selectedIndex].value;
//
//  // find the player whose subsitute button was clicked
//  var playerOut = event.target.nextSibling.nextSibling.id;
//  playerOut = playerOut.split('-')
//  var playerIndex = playerOut[playerOut.length - 2];
//  playerOut = playerOut[playerOut.length - 1];
//  console.log('out: ' + playerOut);
//  console.log('index: ' + playerIndex);
//  console.log('in: ' + playerIn);
//
//  //var options = {
//    //type: 'POST',
//    //url: '/team/p_substitute',
//    //success: function(response) {
//      //console.log('swap successful');
//      //console.log('in: ' + playerIn);
//      //console.log('out: ' + playerIn);
//    //a
//  //} 
//  
//  $.ajax({
//    type: 'POST',
//    url: '/team/p_substitute/' 
//      + gameId + '/' + playerOut + '/' + playerIn 
//      + '/' + playerIndex,
//    success: function(response) {
//      console.log(response);
//      location.reload();
//      //console.log('swap successful');
//      //console.log('in: ' + playerIn);
//      //console.log('out: ' + playerOut);
//      
//    }
//  });
//
//
//});


