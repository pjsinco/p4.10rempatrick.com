<?php 

class scoreboard_controller extends base_controller
{
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->template->content = View::instance('v_scoreboard_index');

    echo $this->template;
  }

  public function clock() {
    $this->template->content = View::instance('v_scoreboard_clock');

    // add js files
    $client_files_head = Array(
      '/js/scoreboard_clock.js'
    );
    $this->template->client_files_body =
      Utils::load_client_files($client_files_head);

    //render view
    echo $this->template;
  }

  public function team_score($game_id, $team_id) {
    $this->template->content = View::instance('v_scoreboard_team_score');

    $this->template->content->team_id = $team_id; 
    $this->template->content->side = 
      Helpers::get_side($game_id, $team_id);
    // pass team score to view
    $team_score = Helpers::get_team_points($game_id, $team_id);
    $this->template->content->score = $team_score;

    //render view
    echo $this->template;
  }

  public function period($game_id) {
    $this->template->content = View::instance('v_scoreboard_period');
    $client_files_body = Array(
      '/js/scoreboard_change_period.js'
    );
    $this->template->client_files_body =
      Utils::load_client_files($client_files_body);
    
    // pass current period to view
    $this->template->content->current_period =
      Helpers::get_period($game_id);
  
    //render view
    echo $this->template;
  }

  public function p_change_period($game_id, $increment) {
    // convert string 'bool' to real bool
    $increment = ($increment == 'true' ? true : false);

    $per = Helpers::change_period($game_id, $increment);
    
    echo $per;
  }

  public function team_fouls($game_id, $team_id) {
    $this->template->content = View::instance('v_scoreboard_team_fouls');
    $client_files_body = Array(
      
    );
    $this->template->client_files_body =
      Utils::load_client_files($client_files_body);

    $this->template->content->fouls =
      Helpers::get_team_fouls($game_id, $team_id);

    //render view
    echo $this->template;
  }

  public function p_team_fouls($game_id, $team_id) {
    
    
  }

} // eoc

?>
