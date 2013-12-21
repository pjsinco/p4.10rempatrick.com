$('.substitute').click(function(event) {

  var playerIn = event.target.previousSibling.previousSibling.previousSibling.previousSibling;
  playerIn = playerIn.options[playerIn.selectedIndex].value;

  // find the player whose subsitute button was clicked
  var playerOutId = event.target.nextSibling.nextSibling.id;
  var outId = playerOutId.split('-')
  console.log('out: ' + outId[outId.length -1]);
  console.log('in: ' + playerIn);
});
