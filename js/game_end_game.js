(function(){
  // http://stackoverflow.com/questions/3519861
  //  /yes-or-no-confirm-box-using-jquery
  $('#end-game').click(function() {
    $('<div></div>').appendTo('body')
      .html('<div><h6>Are you sure you want to end the game')
      .dialog({
        modal: true,
        title: 'End the game',
        zIndex: 10000,
        autoOpen: true,
        width: 'auto',
        resizable: false,
        buttons: {
          Yes: function() {
            $(this).dialog('close');
          },
          No: function() {
            $(this).dialog('close');
          }
        },
        close: function(event, ui) {
          $(this).remove();
        }
      });
    });
})();
