<?php 

class scoresheet_controller extends base_controller
{
  public function __construct() {
    parent::__construct();
  }

  public function index($game_id) {
    $this->template->content = View::instance('v_scoresheet_index');

    // get teams and players
    $game = Helpers::get_game($game_id);
    $home = Helpers::get_team($game['home']);
    $away = Helpers::get_team($game['away']);
    $home_players = 
      Helpers::get_players_from_game($game_id, $home['team_id']);
    $away_players = 
      Helpers::get_players_from_game($game_id, $away['team_id']);

    $client_files_body = Array(
      '/js/scoreboard_clock.js',
      '/js/team_display.js'
    );
    $this->template->client_files_body =
      Utils::load_client_files($client_files_body);

    //$this->template->content->gameplays = 
      //View::instance('v_game_gameplay');

    // pass home team to view
    $this->template->content->home =
      View::instance('v_team_display');
    $this->template->content->home->players = $home_players;
    $this->template->content->home->team =
      $home['name'] . ' ' . $home['nickname']; 
    // set up bench picker for home 
    $home_bench = Array();
    foreach ($home_players as $player) {
      if ($player['playing'] == 0) {
        array_push($home_bench, $player);
      }
    }
    $this->template->content->home->bench = $home_bench;


    // pass away team to view
    $this->template->content->away =
      View::instance('v_team_display');
    $this->template->content->away->players = $away_players;
    $this->template->content->away->team =
      $away['name'] . ' ' . $away['nickname']; 
    // set up bench picker for away
    $away_bench = Array();
    foreach ($away_players as $player) {
      if ($player['playing'] == 0) {
        array_push($away_bench, $player);
      }
    }
    $this->template->content->away->bench = $away_bench;

    $this->template->content->clock =
      View::instance('v_scoreboard_clock');

    $this->template->content->set('game_id', $game_id);

    echo $this->template;
  }


}



?>
