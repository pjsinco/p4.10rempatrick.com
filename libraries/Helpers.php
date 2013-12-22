<?php 

class Helpers 
{
  /*--------------------------------------------------------------------

  --------------------------------------------------------------------*/ 
  public static function get_player($game_id, $player_id) {
    $q = "
      SELECT *
      FROM plays_in pi inner join player p
        on pi.player = p.player_id
      WHERE pi.player = $player_id
        AND pi.game = $game_id
    ";
    $player = DB::instance(DB_NAME)->select_row($q);
  
    return $player;
  }

  /*--------------------------------------------------------------------

  --------------------------------------------------------------------*/ 
  public static function get_players_playing($game_id, $team_id) {
    $players = self::get_players_from_game($game_id, $team_id);

    $playing_players = Array();
    foreach ($players as $player) {
      if ($player['playing'] == 1) {
        array_push($playing_players, $player);
      }
    }

    return $playing_players;
  }

  /*--------------------------------------------------------------------

  --------------------------------------------------------------------*/ 
  public static function get_players_benched($game_id, $team_id) {
    $players = self::get_players_from_game($game_id, $team_id);

    $bench_players = Array();
    foreach ($players as $player) {
      if ($player['playing'] == 0) {
        array_push($bench_players, $player);
      }
    }

    return $bench_players;
  }

  /*--------------------------------------------------------------------

  --------------------------------------------------------------------*/ 
  public static function get_players_from_game($game_id, $team_id) {
    $q = "
      SELECT pi.*, p.* 
      FROM plays_in pi INNER JOIN player p
        ON p.player_id = pi.player
      WHERE pi.game = $game_id
        AND pi.team = $team_id
    ";
    $players = DB::instance(DB_NAME)->select_rows($q);
  
    return $players;
  }

  /*--------------------------------------------------------------------

  --------------------------------------------------------------------*/ 
  public static function get_players_from_team($team_id) {
    $q = "
      SELECT *
      FROM player 
      WHERE team = $team_id
    ";
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
