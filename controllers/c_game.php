<?php 

class game_controller extends base_controller
{
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    // add title
    $this->template->title = 'Basketball Scoresheet';
    
    // add view
    $this->template->content = View::instance('v_game_index');

    // render view
    echo $this->template;;
    
  }

  // new game is initated by creating home, away teams
  public function create($error = null) {
    $this->template->title = 'Create game';

    $client_files_body = Array(
      '/js/jquery.form.min.js',
      '/js/game_create.js'
    );

    $this->template->client_files_body = 
      Utils::load_client_files($client_files_body);
    $this->template->content = View::instance('v_game_create');

    // get list of all teams
    $q = "
      SELECT *
      FROM team
      order by name asc;
    ";
    $teams = DB::instance(DB_NAME)->select_rows($q);

    // pass list of teams to view
    $this->template->content->teams = $teams;
    $this->template->content->app_name = APP_NAME;
    $this->template->content->error = $error;

    // render view
    echo $this->template;
  }

  public function p_create() {

    if ($_POST['home'] == $_POST['away']) {
      Router::redirect('/game/create/error');
    }

    // create game
    $data = Array(
      'home' => $_POST['home'],
      'away' => $_POST['away'],
      'created' => Time::now()
      //'periods' => $_POST['periods'],
      //'period_minutes' => $_POST['period-minutes']
    );
    $game_id = DB::instance(DB_NAME)->insert('game', $data);

    // add game's players to plays_in table
    $this->add_players_to_db($_POST['home'], $game_id);
    $this->add_players_to_db($_POST['away'], $game_id);

    Router::redirect('/scoresheet/index/' . $game_id);
    //Router::redirect('/team/add_player/' . $home_id . '/' . $game_id);
  }

  private function add_players_to_db($team_id, $game_id) {
    $starters = 0; // set 5 starters

    $team_players = Helpers::get_players_from_team($team_id);
    foreach ($team_players as $player) {
      $player_data = Array(
        'player' => $player['player_id'],
        'team' => $team_id,
        'game' => $game_id
      );
      if ($starters < 5) {
        $player_data['playing'] = 1;
        $starters++;
      }

      DB::instance(DB_NAME)->insert_row('plays_in', $player_data);
    }

  }
  public function gameplay() {

    $this->template->content = View::instance('v_game_gameplay');

    // add gameplay buttons
    //$this->template->content->two_pt_missed = '2pt missed';
    //$this->template->content->two_pt_made = '2pt made';
    //$this->template->content->three_pt_missed = '3pt missed';
    //$this->template->content->three_pt_made = '3pt made';
    //$this->template->content->ft_pt_missed = 'ft missed';
    //$this->template->content->ft_pt_made = 'ft made';

    // render view
    echo $this->template;

  }



}
?>
