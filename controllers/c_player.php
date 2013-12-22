<?php 

require_once(APP_PATH . '/config/constants.php');

class player_controller extends base_controller
{

  public function __construct() {
    parent::__construct();
  }

  public function display($game_id, $player_id) {
    // get player
    $player = Helpers::get_player($game_id, $player_id);
    $player['points'] = 
      Helpers::get_player_points($game_id, $player_id);

    $this->template->content = View::instance('v_player_display');
    $this->template->content->player = $player;

    echo $this->template;
  }

  public function stat_change($game_id, $player_id, $stat, $increment = 1) {
    
  }

} // eoc
?>
