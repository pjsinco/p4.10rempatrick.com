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
      '/js/team_display.js',
      '/js/team_substitute.js'
    );
    $this->template->client_files_body =
      Utils::load_client_files($client_files_body);

    // pass home team to view
    $this->template->content->home =
      View::instance('v_team_display');
    $this->template->content->home->players = $home_players;
    $this->template->content->home->team =
      $home['name'] . ' ' . $home['nickname']; 
    $this->template->content->home->bench = 
      View::instance('v_team_bench');
    $this->template->content->home->bench->game_id = 
      $game_id;
    $this->template->content->home->bench->benched = 
      Helpers::get_bench_players($game_id, $home['team_id']);

    // pass away team to view
    $this->template->content->away =
      View::instance('v_team_display');
    $this->template->content->away->players = $away_players;
    $this->template->content->away->team =
      $away['name'] . ' ' . $away['nickname']; 
    $this->template->content->away->bench = 
      View::instance('v_team_bench');
    $this->template->content->away->bench->game_id = 
      $game_id;
    $this->template->content->away->bench->benched = 
      Helpers::get_bench_players($game_id, $away['team_id']);

    $this->template->content->clock =
      View::instance('v_scoreboard_clock');

    $this->template->content->set('game_id', $game_id);

    echo $this->template;
  }


}



?>
