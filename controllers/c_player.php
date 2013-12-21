<?php 
class player_controller extends base_controller
{
  const FG2 = 2; // points for regular field goal
  const FG3 = 3; // points for 3-pt field goal
  const FT = 1; // points for free throw

  public function __construct() {
    parent::__construct();
  }

  public function display($game_id, $player_id) {
    // get player
    $player = Helpers::get_player($game_id, $player_id);


    $this->template->content = View::instance('v_player_display');
    $this->template->content->player = $player;
    $this->template->content->points = 
      ((int) $player['fg2made'] * self::FG2) + 
      ((int) $player['fg3made'] * self::FG3) +
      ((int) $player['ft_made'] * self::FT);


    echo $this->template;
  }

} // eoc
?>
