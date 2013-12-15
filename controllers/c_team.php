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

  public function display() {

    // hard-coding some values for now
    //$home = new Team('Bulls', true);
    //$home->add_player(new Player('Hinrich', 'K.', '12'));
    //$home->add_player(new Player('Snell', 'T.', '20'));
    //$home->add_player(new Player('Deng', 'L.', '9'));
    //$home->add_player(new Player('Boozer', 'C.', '5'));
    //$home->add_player(new Player('Noah', 'J.', '13'));
    
    //$away = new Team('Raptors', false);
    //$away->add_player(new Player('Lowry', 'K.', '7'));
    //$away->add_player(new Player('DeRoza', 'D..', '10'));
    //$away->add_player(new Player('Fields', 'L.', '2'));
    //$away->add_player(new Player('Johnson', 'A..', '15'));
    //$away->add_player(new Player('Valanciunas', 'J.', '17'));

    $this->template->content = View::instance('v_team_display');
    $this->template->content->home = $home;    
    $this->template->content->away = $away;    

    //render view
    echo $this->template;
  }

  
  
  
  
} // eoc

?>
