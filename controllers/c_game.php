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

  public function p_create() {
    //echo Debug::dump($_POST);

    // create home team
    $data = Array(
      'name' => $_POST['home-team-name'],
      'nickname' => $_POST['home-nickname']
    );
    $home = DB::instance(DB_NAME)->insert('teams', $data);
      
    // create away team
    $data = Array(
      'name' => $_POST['away-team-name'],
      'nickname' => $_POST['away-nickname']
    );
    $away = DB::instance(DB_NAME)->insert('teams', $data);

    // create game
    $data = Array(
      'home' => $home,
      'away' => $away,
      'created' => Time::now(),
      'periods' => $_POST['periods'],
      'period_minutes' => $_POST['period-minutes']
    );
    $game_id = DB::instance(DB_NAME)->insert('games', $data);

    //echo Debug::dump($game_id);

    //Router::redirect('/scoresheet/index/' . $game_id);
    Router::redirect('/team/add_player/' . $game_id);
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
