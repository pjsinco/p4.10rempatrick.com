<?php 

class Team
{
  protected $nickname;
  protected $players; // array of Player objects
  protected $home; // boolean
  protected $points;
  protected $fouls;
  protected $bonus; // boolean

  public function __construct($nickname, $home = false) {
    $this->players = Array();
    $this->home = $home;
    $this->nickname = $nickname;
  }

  public function add_player($player) {
    $this->players[$player->jersey] = $player;
  }

  public function get_player($player) {
    return $this->players[$player->jersey];
  }

  public function __set($field, $value) {
    $this->$field = $value;
  }

  public function __get($field) {
    if (isset($this->$field)) {
      return $this->$field;
    }

    return null;
  }

  public function is_home() {
    return $this->home;
  }
  

} // eoc

?>
