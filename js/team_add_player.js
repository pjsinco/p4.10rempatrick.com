//$(document).ready(function() {
  //$('#add-player').ajaxForm();
//});

//var queryString = document.URL.split('/');
//var teamId = queryString[queryString.length - 1];

var options = {
  type: 'POST',
  url: '/team/p_add_player',
  //beforeSubmit: function() {
    //$('#roster').html('Adding ...');
  //},
  success: function(response) {
    $('#roster').append(response);
  },
  resetForm: true,
  data: teamId
};

//$('#add-player').ajaxForm(options);
//console.log(teamId);
