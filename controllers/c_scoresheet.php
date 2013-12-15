<?php 

class scoresheet_controller extends base_controller
{
  public function __construct() {
    parent::__construct();
  }

  public function index($game_id) {
    $this->template->content = View::instance('v_scoresheet_index');

    $this->template->content->gameplays = 
      View::instance('v_game_gameplay');

    $this->template->content->teams =
      View::instance('v_team_display');

    echo $this->template;
  }


}



?>
