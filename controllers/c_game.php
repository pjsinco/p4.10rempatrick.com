<?php 

class game_controller extends base_controller
{
  public function __construct() {
    parent::__construct();
  }

  public function gameplay() {

    $this->template->content = View::instance('v_game_gameplay');

    // add gameplay buttons
    $this->template->content->two_pt_missed = '2pt missed';
    $this->template->content->two_pt_made = '2pt made';
    $this->template->content->three_pt_missed = '3pt missed';
    $this->template->content->three_pt_made = '3pt made';
    $this->template->content->ft_pt_missed = 'ft missed';
    $this->template->content->ft_pt_made = 'ft made';

    // render view
    echo $this->template;

  }



}
?>
