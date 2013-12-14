<?php 

class scoreboard_controller extends base_controller
{
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->template->content = View::instance('v_scoreboard_index');

    echo $this->template;
  }

  public function clock() {
    $this->template->content = View::instance('v_scoreboard_clock');

    // add js files
    $client_files_head = Array(
      '/js/scoreboard_clock.js'
    );
    $this->template->client_files_body =
      Utils::load_client_files($client_files_head);

    //render view
    echo $this->template;
  }


} // eoc


?>
