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

    // get list of all teams
    $q = "
      SELECT *
      FROM team
      order by name asc;
    ";
    $teams = DB::instance(DB_NAME)->select_rows($q);

    // pass list of teams to view
    $this->template->content->teams = $teams;

    // render view
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

    // create game
    $data = Array(
      'home' => $_POST['home'],
      'away' => $_POST['away'],
      'created' => Time::now()
      //'periods' => $_POST['periods'],
      //'period_minutes' => $_POST['period-minutes']
    );
    $game_id = DB::instance(DB_NAME)->insert('game', $data);

    Router::redirect('/scoresheet/index/' . $game_id);
    //Router::redirect('/team/add_player/' . $home_id . '/' . $game_id);
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
