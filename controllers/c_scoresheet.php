<?php 

class scoresheet_controller extends base_controller
{
  public function __construct() {
    parent::__construct();
  }

  public function index($game_id) {
    $this->template->content = View::instance('v_scoresheet_index');

    // needed?
    $q = "
      SELECT *
      FROM game
      WHERE game_id = $game_id
    ";
    $game = DB::instance(DB_NAME)->select_row($q);

    echo Debug::dump($game);

    $client_files_body = Array(
      '/js/scoreboard_clock.js'
    );
    $this->template->client_files_body =
      Utils::load_client_files($client_files_body);

    $this->template->content->gameplays = 
      View::instance('v_game_gameplay');

    $this->template->content->home =
      View::instance('v_team_display');

    $this->template->content->clock =
      View::instance('v_scoreboard_clock');

    $this->template->content->set('game_id', $game_id);

    echo $this->template;
  }


}



?>
