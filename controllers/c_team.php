<?php 

require_once(APP_PATH . '/config/constants.php');

class team_controller extends base_controller
{

  public function __construct() {
    parent::__construct();
  }


  public function display($game_id, $team_id) {

    // get  players
    $players_playing = Helpers::get_players_playing($game_id, $team_id);

    // get team 
    $team = Helpers::get_team($team_id);

    $this->template->content = View::instance('v_team_display');

    $client_files_body = Array(
      '/js/team_display.js'
    );
    $this->template->client_files_body =
      Utils::load_client_files($client_files_body);

    // pass players, team to view

    for ($i = 1; $i <= FLOOR_PLAYERS; $i++) {
      $player = $players_playing[$i - 1];
      $player['points'] = 
        Helpers::get_player_points($game_id, $player['player_id']);
      $p = 'player_' . $i;
      $this->template->content->$p = 
        View::instance('v_player_display');
      $this->template->content->$p->player = $player;
    }

    //$this->template->content->players = $players;    
    $this->template->content->team = 
      $team['name'] . ' ' . $team['nickname'];    
    $this->template->content->bench = 
      View::instance('v_team_bench');
    $this->template->content->bench->benched =
      Helpers::get_players_benched($game_id, $team_id);
    $this->template->content->bench->game_id =
      $game_id;


    // get player points

    // render view
    echo $this->template;
  }

  public function bench($game_id, $team_id) {
    $this->template->content = View::instance('v_team_bench');
  
    $players = Helpers::get_bench_players($game_id, $team_id);

    $this->template->content->benched = $players;
    $this->template->content->game_id = $game_id;

    for ($i = 1; $i <= FLOOR_COUNT; $i++) {
      
    }
    // render view
    echo $this->template;

  }
  
  public function p_bench() {


  }

  public function p_substitute($game_id, $player_out, $player_in, 
    $index) {
    $client_files_body = Array(
      '/js/team_substitute.js',
    );
    $this->template->client_files_body =
      Utils::load_client_files($client_files_body);

    // move player_out to bench
    $data = array(
      'playing' => 0
    );
    $where = "WHERE game = $game_id and player = $player_out";
    $success_out = DB::instance(DB_NAME)->update_row('plays_in', $data, $where);

    // move player_in to game
    $data = array(
      'playing' => 1
    );
    $where = "WHERE game = $game_id and player = $player_in";
    $success_in = DB::instance(DB_NAME)->update_row('plays_in', $data, $where);

    echo $index;
    //echo "game_id: $game_id; subbing: $player_out is out; $player_in is in\n";
    //echo "swap " . ($success_out + $success_in == 2 ? "succeeded" : "failed");
  }
  
  
  
  public function add_player($team_id, $game_id) {
    $this->template->title = 'Add players';

    // get team
    $q = "
      SELECT *
      FROM team
      WHERE team_id = $team_id
    ";
    $team = DB::instance(DB_NAME)->select_row($q);

    $this->template->content = View::instance('v_team_add_player');
    
    // pass team info to view
    $this->template->content->name = $team['name'];
    $this->template->content->nickname = $team['nickname'];
    $this->template->content->team_id = $team['team_id'];

    // get team's players
    $q = "
      SELECT 
      FROM player p inner join plays_in pi
        on p.player_id = pi.player_id
      WHERE game_id = $game_id
    ";
    //$players = DB::instance(DB_NAME)->select_rows(

    // link js
//    $client_files_body = Array(
//      '/js/jquery.form.min.js',
//      '/js/team_add_player.js'
//    );
//    $this->template->client_files_body = 
//      Utils::load_client_files($client_files_body);

    // render view
    echo $this->template;
  }

  public function p_add_player($team_id) {
    echo Debug::dump($team_id);
    //echo Debug::dump($_POST);
    if (isset($_POST)) { 
      $first_name = $_POST['first-name'];
      $last_name = $_POST['last-name'];
      $jersey = $_POST['jersey'];
      $position = $_POST['position'];

      $data = Array(
        'team' => $team_id,
        'last_name' => $last_name,
        'first_name' => $first_name,
        'jersey' => $jersey
      );  
      echo Debug::dump($data);
      $player_id = DB::instance(DB_NAME)->insert('player', $data);
      
      printf('#%s: %s %s (%s)', 
        $jersey, $first_name, $last_name, $position);
    }

    //echo '<pre>'; var_dump($_POST); echo '</pre>'; // debug

  }
  
} // eoc

?>
