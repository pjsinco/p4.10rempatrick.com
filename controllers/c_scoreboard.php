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

    $this->template->content->side =
      Helpers::get_side($game_id, $team_id);
    
    // pass team score to view
    $team_score = Helpers::get_team_score($game_id, $team_id);
    $this->template->content->score = $team_score;

    //render view
    echo $this->template;
  }


} // eoc


?>
