<?php 

class Player
{
  protected $last_name;
  protected $first_name;
  protected $jersey;
  protected $position;
  protected $points;
  protected $rebounds;
  protected $fouls;
  protected $assists;
  protected $blocks;
  protected $turnovers;
  protected $fg2missed;
  protected $fg2made;
  protected $fg3missed;
  protected $fg3made;
  protected $ft_miss;
  protected $ft_made;

  public function __construct($last_name, $first_name, $jersey) {
    $this->last_name = $last_name;
    $this->first_name = $first_name;
    $this->jersey = $jersey;
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

} // eoc

?>
