<?php 

class scoresheet_controller extends base_controller
{
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->template->content = View::instance('v_scoresheet_index');

    $this->template->content->gameplays = 
      View::instance('v_game_gameplay');

    echo $this->template;
  }


}



?>
