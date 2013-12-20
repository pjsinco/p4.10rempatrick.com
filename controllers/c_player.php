<?php 
class player_controller extends base_controller
{

  public function __construct() {
    parent::__construct();
  }

  public function display($game_id, $player_id) {
    // get player
    $player = Helpers::get_player($player_id);
    
    $this->template->content = View::instance('v_player_display');
    $this->template->content->player = $player;

    //$this->template->content->pts = 
      //Helpers::get_player_pts(

    echo $this->template;

  }




} // eoc
?>
