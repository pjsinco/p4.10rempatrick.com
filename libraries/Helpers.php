<?php 

require_once APP_PATH . '/config/constants.php';

class Helpers 
{
  /*--------------------------------------------------------------------
  Retrieves team IDs of teams playing
  Param:
    $game_id int
  Returns:
    An associatiave array of the teams playing
  --------------------------------------------------------------------*/ 
  public static function get_teams_playing($game_id) {
    $q = "
      SELECT home, away
      FROM game
      WHERE game_id = $game_id
    ";

    $teams = DB::instance(DB_NAME)->select_row($q);

    return $teams;

  }

  /*--------------------------------------------------------------------
  Retrieves team stats
  Param:
    $game_id int
    $team_id int
  Returns:
    A 2D array of the team's stats for the game
  --------------------------------------------------------------------*/ 
  public static function get_team_stats($game_id, $team_id) {
    $team_stats = array(); // 2D array of player stats
    
    // get array of player ids for team
    $q = "
      SELECT player
      FROM plays_in
      WHERE game = $game_id
        AND team = $team_id
    ";
    $team_player_ids = DB::instance(DB_NAME)->select_rows($q);
    

    foreach ($team_player_ids as $id) {
      $player_line = self::get_player_stats($game_id, $id['player']);
      array_push($team_stats, $player_line);
    }
  
    return $team_stats;
  }

  /*--------------------------------------------------------------------
  Retrieves a player's stats
  Param:
    $game_id int
    $player_id int
  Returns:
    An array of the player's stats for the game
  --------------------------------------------------------------------*/ 
  public static function get_player_stats($game_id, $player_id) {
    $q = "
      SELECT
        CONCAT(p.first_name, ' ', p.last_name) AS full_name,
        SUM((pi.fg2 * 2) + (pi.fg3 * 3) + (pi.ft * 1)) AS PTS,
        SUM(pi.fg2miss + pi.fg3miss + pi.fg3 + pi.fg2) AS FGA,
        SUM(pi.fg2 + pi.fg3) AS FGM,
        SUM(pi.ft_miss + pi.ft) AS FTA,
        pi.ft AS FTM,
        SUM(pi.fg3miss + pi.fg3) AS 3PA,
        pi.fg3 as 3PM,
        pi.pf AS PF, 
        pi.a AS AST, 
        pi.reb AS REB
      FROM plays_in pi INNER JOIN player p
        ON pi.player = p.player_id
      WHERE pi.player = $player_id
        AND pi.game = $game_id
    ";

    $stats = DB::instance(DB_NAME)->select_row($q);
    
    return $stats;
  }

  /*--------------------------------------------------------------------
  Gets the number of a team's fouls
  Param:
    $game_id int
    $team_id int
  Returns:
    The number of fouls
  --------------------------------------------------------------------*/ 
  public static function get_team_fouls($game_id, $team_id) {
    $q = "
      SELECT sum(pf)
      FROM plays_in
      WHERE game = $game_id
        AND team = $team_id
    ";
    $team_fouls = DB::instance(DB_NAME)->select_field($q);

    return $team_fouls;
  }

  /*--------------------------------------------------------------------
  Gets the team ID for a player
  Param:
    $game_id int
    $player_id int
  Returns:
    The team ID for the player's team
  --------------------------------------------------------------------*/ 
  public static function get_team_for_player($game_id, $player_id) {
    $q = "
      SELECT team
      FROM plays_in
      WHERE game = $game_id
        AND player = $player_id
    ";
    $team = DB::instance(DB_NAME)->select_field($q);
    
    return $team;
  }

  /*--------------------------------------------------------------------
  Get the current period
  Param:
    $game_id int
  Returns:
    The current period
  --------------------------------------------------------------------*/ 
  public static function get_period($game_id) {
    $q = "
      SELECT cur_per
      FROM game
      WHERE game_id = $game_id
    ";
    $period = DB::instance(DB_NAME)->select_field($q);
    
    return $period;
  }

  /*--------------------------------------------------------------------
  Increment or decrement the current period
  Param:
    $game_id int
    $increment boolean - false if decrementing
  Returns:
    The new value for the period
  --------------------------------------------------------------------*/ 
  public static function change_period($game_id, $increment) {
    $q = "
      UPDATE game
      SET cur_per = cur_per " . (($increment) ? "+" : "-") . " 1
      WHERE game_id = $game_id
    ";
    DB::instance(DB_NAME)->query($q);

    return self::get_period($game_id);
  }

  /*--------------------------------------------------------------------

  --------------------------------------------------------------------*/ 
  public static function get_player_points($game_id, $player_id) {
    $q = "
      SELECT SUM((fg2 * " . FG2 . ") + (fg3 * " . FG3 . ") + (ft * " . FT . ")) 
      FROM plays_in
      WHERE game = $game_id
        AND player = $player_id
    ";
    $player_points = DB::instance(DB_NAME)->select_field($q);
    
    return $player_points;
  }

  /*--------------------------------------------------------------------

  --------------------------------------------------------------------*/ 
  public static function get_team_points($game_id, $team_id) {
    $q = "
      SELECT SUM((fg2 * " . FG2 . ") + (fg3 * " . FG3 . ") + (ft * " . FT . ")) 
      FROM plays_in
      WHERE game = $game_id
        AND team = $team_id
    ";

    $team_points = DB::instance(DB_NAME)->select_field($q);
    
    return $team_points;
  }

  /*--------------------------------------------------------------------
  Determines whether the given team is the home or away side
  Param:
    $game_id int
    $team_id int
  Returns:
    'home' or 'away' string
  --------------------------------------------------------------------*/ 
  public static function get_side($game_id, $team_id) {
    $q = "
      SELECT home, away
      FROM game
      WHERE game_id = $game_id
    ";

    $teams = DB::instance(DB_NAME)->select_row($q);

    if ($teams['home'] == strval($team_id)) {
      return 'home';
    }

    return 'away';
  }

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
