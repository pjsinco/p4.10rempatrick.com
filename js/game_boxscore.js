(function() {
  $('table.boxscore tr:even').css('background-color', '#f5f5f5');

  $('#new-game').click(function() {
    $('<div></div>').appendTo('body')
      .html('<div><h6>Are you sure you want '
          + 'to leave the box score and start a new game?')
      .dialog({
        modal: true,
        title: 'New game?',
        zIndex: 10000,
        autoOpen: true,
        width: 'auto',
        resizable: false,
        buttons: {
          Yes: function() {
            document.location.href = '/';
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
