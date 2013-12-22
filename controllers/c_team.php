<?php 
class team_controller extends base_controller
{

  public function __construct() {
    parent::__construct();
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

  public function display($team_id) {

    // get  players
    $players = Helpers::get_players($team_id);

    // get team 
    $team = Helpers::get_team($team_id);

    $this->template->content = View::instance('v_team_display');

    $client_files_body = Array(
      '/js/team_display.js'
    );
    $this->template->client_files_body =
      Utils::load_client_files($client_files_body);

    // pass players, team to view
    $this->template->content->players = $players;    
    $this->template->content->team = 
      $team['name'] . ' ' . $team['nickname'];    


    // get player points

    // render view
    echo $this->template;
  }

  public function bench($game_id, $team_id) {
    $this->template->content = View::instance('v_team_bench');
  
    $players = Helpers::get_bench_players($game_id, $team_id);

    $this->template->content->bench = $players;
    $this->template->content->game_id = $game_id;

    // render view
    echo $this->template;

  }
  
  public function p_bench() {


  }

  public function p_substitute($game_id, $player_out, $player_in) {
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

    echo "game_id: $game_id; subbing: $player_out is out; $player_in is in\n";
    echo "swap " . ($success_out + $success_in == 2 ? "succeeded" : "failed");
  }
  
  
  
  
} // eoc

?>
