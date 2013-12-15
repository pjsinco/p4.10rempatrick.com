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
  protected $two_pt_missed;
  protected $two_pt_made;
  protected $three_pt_missed;
  protected $three_pt_made;
  protected $ft_missed;
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

//  public function get_jersey() {
//    return $this->jersey;
//  }
//
//  public function get_last_name() {
//    return $this->last_name;
//  }
//
//  public function get_first_name() {
//    return $this->first_name;
//  }
//
//  public function set_points($points) {
//    $this->points += $points;
//  }
//
//  public function get_points() {
//    return $this->points;
//  }



} // eoc

?>
