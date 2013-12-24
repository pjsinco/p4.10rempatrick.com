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

  public function points($game_id, $player_id) {
    
  }

  public function p_increment_stat($game_id, $player_id, $stat) {
    $q = "
      UPDATE plays_in
      SET $stat = $stat + 1 
      WHERE game = $game_id
        AND player = $player_id
    ";
    DB::instance(DB_NAME)->query($q);

    $team_id = Helpers::get_team_for_player($game_id, $player_id);
    $data = array(
      'game_id' => $game_id,
      'player_id' => $player_id,
      'player_points' => 
        Helpers::get_player_points($game_id, $player_id),
      'team_id' => $team_id,
      'team_points' => Helpers::get_team_points($game_id, $team_id)
    );
    echo json_encode($data);
  }

} // eoc
?>
