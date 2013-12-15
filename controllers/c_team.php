<?php 
class team_controller extends base_controller
{

  public function __construct() {
    parent::__construct();
  }

  public function display() {

    // hard-coding some values for now
    $home = new Team('Bulls', true);
    $home->add_player(new Player('Hinrich', 'K.', '12'));
    $home->add_player(new Player('Snell', 'T.', '20'));
    $home->add_player(new Player('Deng', 'L.', '9'));
    $home->add_player(new Player('Boozer', 'C.', '5'));
    $home->add_player(new Player('Noah', 'J.', '13'));
    
    $away = new Team('Raptors', false);
    $away->add_player(new Player('Lowry', 'K.', '7'));
    $away->add_player(new Player('DeRoza', 'D..', '10'));
    $away->add_player(new Player('Fields', 'L.', '2'));
    $away->add_player(new Player('Johnson', 'A..', '15'));
    $away->add_player(new Player('Valanciunas', 'J.', '17'));





    $this->template->content = View::instance('v_team_display');
    $this->template->content->home = $home;    
    $this->template->content->away = $away;    

    //render view
    echo $this->template;
  }

  
  
  
  
} // eoc

?>
