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
  public function create() {
    $this->template->title = 'Create game';

    $client_files_body = Array(
      '/js/jquery.form.min.js',
      '/js/game_create.js'
    );

    $this->template->client_files_body = 
      Utils::load_client_files($client_files_body);
    $this->template->content = View::instance('v_game_create');

    echo $this->template;
  }

  
  // checks if team already exists
  //private function team_exists($name, $nickname) {
  //  $q = "
  //    SELECT team_id
  //    FROM team
  //    WHERE name = '$name'
  //     and nickname = '$nickname'
  //  ";
  //  $team_id = DB::instance(DB_NAME)->select_field($q);
  //
  //  if ($team_id) {
  //    return true;
  //  }
  //  
  //  return false;
  //}


  public function p_create() {

    $home_name = $_POST['home-name'];
    $home_nickname = $_POST['home-nickname'];
    $away_name = $_POST['away-name'];
    $away_nickname = $_POST['away-nickname'];

    // process home team
    $q = "
      SELECT team_id
      FROM team
      WHERE name = '$home_name'
        and nickname = '$home_nickname'
    ";
    $home_id = DB::instance(DB_NAME)->select_field($q);

    if (!$home_id) {
      // add to db  
      $data = Array(
        'name' => $home_name,
        'nickname' => $home_nickname
      );
    }

    // process away team
    $q = "
      SELECT team_id
      FROM team
      WHERE name = '$away_name'
        and nickname = '$away_nickname'
    ";
    $away_id = DB::instance(DB_NAME)->select_field($q);

    if (!$away_id) {
      // add to db  
      $data = Array(
        'name' => $away_name,
        'nickname' => $away_nickname
      );
    }

    // create game
    $data = Array(
      'home' => $home_id,
      'away' => $away_id,
      'created' => Time::now(),
      'periods' => $_POST['periods'],
      'period_minutes' => $_POST['period-minutes']
    );
    $game_id = DB::instance(DB_NAME)->insert('game', $data);

    //Router::redirect('/scoresheet/index/' . $game_id);
    Router::redirect('/team/add_player/' . $home_id . '/' . $game_id);
  }

  public function gameplay() {

    $this->template->content = View::instance('v_game_gameplay');

    // add gameplay buttons
    $this->template->content->two_pt_missed = '2pt missed';
    $this->template->content->two_pt_made = '2pt made';
    $this->template->content->three_pt_missed = '3pt missed';
    $this->template->content->three_pt_made = '3pt made';
    $this->template->content->ft_pt_missed = 'ft missed';
    $this->template->content->ft_pt_made = 'ft made';

    // render view
    echo $this->template;

  }



}
?>
