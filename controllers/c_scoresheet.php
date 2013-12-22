<?php 

require_once(APP_PATH . '/config/constants.php');

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
    $home_players_playing = 
      Helpers::get_players_playing($game_id, $home['team_id']);
    //$home_players_benched = 
      //Helpers::get_players_benched($game_id, $home['team_id']);
    $away_players_playing = 
      Helpers::get_players_playing($game_id, $away['team_id']);
    //$away_players_benched = 
      //Helpers::get_players_benched($game_id, $away['team_id']);

    $client_files_body = Array(
      '/js/scoreboard_clock.js',
      '/js/team_display.js',
      '/js/team_substitute.js'
    );
    $this->template->client_files_body =
      Utils::load_client_files($client_files_body);

    /*
     * pass home team to view
     */
    $this->template->content->home =
      View::instance('v_team_display');
    //$this->pass_team_to_view($game_id, $home_players_playing,
      //$home_players_benched, $home);
    for ($i = 1; $i <= FLOOR_PLAYERS; $i++) {
      $player = 'player_' . $i;
       $this->template->content->home->$player = 
        $home_players_playing[$i - 1];
    }
    $this->template->content->home->team =
      $home['name'] . ' ' . $home['nickname']; 
    $this->template->content->home->bench = 
      View::instance('v_team_bench');
    $this->template->content->home->bench->game_id = 
      $game_id;
    $this->template->content->home->bench->players_benched = 
      Helpers::get_players_benched($game_id, $home['team_id']);

    /*
     * pass away team to view
     */
    $this->template->content->away =
      View::instance('v_team_display');
    for ($i = 1; $i <= FLOOR_PLAYERS; $i++) {
      $player = 'player_' . $i;
       $this->template->content->away->$player = 
        $away_players_playing[$i - 1];
    }
    $this->template->content->away->players = $away_players_playing;
    $this->template->content->away->team =
      $away['name'] . ' ' . $away['nickname']; 
    $this->template->content->away->bench = 
      View::instance('v_team_bench');
    $this->template->content->away->bench->game_id = 
      $game_id;
    $this->template->content->away->bench->players_benched = 
      Helpers::get_players_benched($game_id, $away['team_id']);

    /*
     * pass clock to view
     */
    $this->template->content->clock =
      View::instance('v_scoreboard_clock');

    /*
     * pass game_id to view
     */
    $this->template->content->game_id = $game_id;

    /*
     * pass home score to view
     */
    $this->template->content->home_score = 
        View::instance('v_scoreboard_team_score');
    $this->template->content->home_score->side = 'home';
    $this->template->content->home_score->score = 
      Helpers::get_team_score($game_id, $home['team_id']);
    
    /*
     * pass away score to view
     */
    $this->template->content->away_score = 
        View::instance('v_scoreboard_team_score');
    $this->template->content->away_score->side = 'away';
    $this->template->content->away_score->score = 
      Helpers::get_team_score($game_id, $away['team_id']);
    
    

    echo $this->template;
  }

  /*------------------------------------------------------------
  NOT USED
  Params:
    $game_id int
    $team_id int
    $players_playing array
    $players_benched array
    $side string ('home' or 'away');
  ------------------------------------------------------------*/
  private function pass_team_to_view($game_id, 
    $players_playing, $players_benched, $side) {

    for ($i = 1; $i <= FLOOR_PLAYERS; $i++) {
      $player = 'player_' . $i;
      $this->template->content->$side->${$player} = 
        $players_playing[$i - 1];
    }

    
  }

}



?>
