<?php 

class Helpers 
{
  /*--------------------------------------------------------------------

  --------------------------------------------------------------------*/ 
<<<<<<< HEAD
  public static function get_players_from_game($game_id, $team_id) {
    $q = "
      SELECT pi.*, p.* 
      FROM plays_in pi INNER JOIN player p
        ON p.player_id = pi.player
      WHERE pi.game = 50
        AND pi.team = 1
    ";
    $players = DB::instance(DB_NAME)->select_rows($q);
  
    return $players;
  }

  /*--------------------------------------------------------------------

  --------------------------------------------------------------------*/ 
  public static function get_players_from_team($team_id) {
=======
  public static function get_player($player_id) {
>>>>>>> 21d7d6f255a5f4921172b7abcd5d378d91a97289
    $q = "
      SELECT *
      FROM player
      WHERE player_id = $player_id 
    ";
    $player = DB::instance(DB_NAME)->select_row($q);
  
    return $player;
  }

  public function get_player_points($game_id, $player_id) {
    $q = "
      SELECT (fg2made + fg3made + ft_made) as pts
      FROM plays_in
      WHERE game = $game_id
        and player = $playe_id
    ";
    $pts = DB::instance(DB_NAME)->select_row($q);

    return $q;
  }


  /*--------------------------------------------------------------------

  --------------------------------------------------------------------*/ 
  public static function get_players($team_id, $game_id) {
    $q = "
      SELECT p.*
      FROM player p inner join plays_in pi
        ON p.player_id = pi.player
      WHERE pi.team = $team_id
        AND pi.game = $game_id
    ";
    //$q = "
      //SELECT *
      //FROM player p inner join team t
        //on p.team = t.team_id
      //WHERE p.team = $team_id
    //";
    $players = DB::instance(DB_NAME)->select_rows($q);
  
    return $players;
  }
  
  /*--------------------------------------------------------------------

  --------------------------------------------------------------------*/ 
  public static function get_game($game_id) {
    $q = "
      SELECT *
      FROM game
      WHERE game_id = $game_id
    ";
    $game = DB::instance(DB_NAME)->select_row($q);
  
    return $game;
  }

  /*--------------------------------------------------------------------

  --------------------------------------------------------------------*/ 
  public static function get_team($team_id) {
    $q = "
      SELECT *
      FROM team
      WHERE team_id = $team_id
    ";
    $team = DB::instance(DB_NAME)->select_row($q);
  
    return $team;
  }

} // eoc
?>
