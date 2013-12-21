$('.substitute').click(function(event) {

  var playerId = event.target.nextSibling.nextSibling.id;
  var id = playerId.split('-')
  console.log(id[id.length -1]);
});
