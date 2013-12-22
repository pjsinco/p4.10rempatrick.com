$('.substitute').click(function(event) {
  // get gameId from url
  var url = window.location.href.split('/');
  var gameId = url[url.length - 1]; 

  var playerIn = event.target.previousSibling.previousSibling.previousSibling.previousSibling;
  playerIn = playerIn.options[playerIn.selectedIndex].value;

  // find the player whose subsitute button was clicked
  var playerOut = event.target.nextSibling.nextSibling.id;
  playerOut = playerOut.split('-')
  playerOut = playerOut[playerOut.length - 1];
  console.log('out: ' + playerOut);
  console.log('in: ' + playerIn);

  //var options = {
    //type: 'POST',
    //url: '/team/p_substitute',
    //success: function(response) {
      //console.log('swap successful');
      //console.log('in: ' + playerIn);
      //console.log('out: ' + playerIn);
    //a
  //} 
  
  $.ajax({
    type: 'POST',
    url: '/team/p_substitute/' 
      + gameId + '/' + playerOut + '/' + playerIn,
    success: function(response) {
      console.log(response);
      location.reload();
      //console.log('swap successful');
      //console.log('in: ' + playerIn);
      //console.log('out: ' + playerOut);
      
    }
  });


});


