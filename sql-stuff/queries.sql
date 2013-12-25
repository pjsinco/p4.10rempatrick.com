create table team (
  team_id INT(11) AUTO_INCREMENT UNIQUE PRIMARY KEY,
  name VARCHAR(64) NOT NULL,
  nickname VARCHAR(64) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

create table player (
  player_id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
  team INT(11) NOT NULL,
  last_name VARCHAR(64) NOT NULL,
  first_name VARCHAR(32) NOT NULL,
  jersey CHAR(2) NOT NULL,
  foreign key (team) references teams(team_id),
  unique (last_name, first_name, jersey, team)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

create table game (
  game_id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
  home INT(11) NOT NULL,
  away INT(11) NOT NULL,
  created INT(11) NOT NULL,
  h_pts smallint not null default 0,
  a_pts smallint not null default 0,
  periods tinyint NOT NULL default 4,
  period_minutes tinyint NOT NULL default 12,
  FOREIGN KEY (home) references teams(team_id),
  FOREIGN KEY (away) references teams(team_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

create table plays_in (
  player INT NOT NULL,
  game INT NOT NULL,
  team INT NOT NULL,
  reb TINYINT default 0,
  o_reb TINYINT default 0,
  assts TINYINT default 0,
  pf TINYINT default 0,
  blks TINYINT default 0,
  turnvr TINYINT default 0,
  fg2miss TINYINT default 0,
  fg2made TINYINT default 0,
  fg3miss TINYINT default 0,
  fg3made TINYINT default 0,
  ft_miss TINYINT default 0,
  ft_made TINYINT default 0,
  foreign key (player) references player(player_id),
  foreign key (game) references game(game_id),
  primary key (player, game)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

alter table plays_in
  add column (playing BOOL default 0)

alter table player
  drop column points,
  drop column rebounds,
  drop column assists,
  drop column fouls,
  drop column blocks,
  drop column turnovers,
  drop column two_pt_missed,
  drop column two_pt_made,
  drop column three_pt_missed,
  drop column three_pt_made,
  drop column ft_missed,
  drop column ft_made

alter table player
  add column (pos ENUM('SG', 'SF', 'C', 'SG', 'PG') NOT NULL)

alter table player
  modify column pos ENUM('SG', 'SF', 'C', 'SG', 'PG', 'PF') NOT NULL


alter table games
  add column (periods int(11) NOT NULL)

alter table games
  add column (period_minutes int(11) NOT NULL)

alter table games
  modify column home_points
    smallint not null default 0

alter table games
  modify column away_points
    smallint not null default 0

alter table games
  modify column periods
    tinyint not null default 4

alter table games
  modify column period_minutes
    tinyint not null default 12

alter table plays_in
  change fg2made fg2 smallint not null default 0,
  change fg3made fg3 smallint not null default 0,
  change ft_made ft smallint not null default 0
      
alter table plays_in
  change assts a smallint not null default 0

alter table game
  add column cur_per tinyint not null default 1

alter table players
  modify column points smallint not null default 0,
  modify column rebounds smallint not null default 0,
  modify column assists smallint not null default 0,
  modify column fouls smallint not null default 0,
  modify column blocks smallint not null default 0,
  modify column turnovers smallint not null default 0,
  modify column two_pt_missed smallint not null default 0,
  modify column two_pt_made smallint not null default 0,
  modify column three_pt_missed smallint not null default 0,
  modify column three_pt_made smallint not null default 0,
  modify column ft_missed smallint not null default 0,
  modify column ft_made smallint not null default 0

rename table games to game,
  players to player,
  teams to team

select pi.*, p.* 
from player p inner join plays_in pi
  on p.player_id = pi.player
where pi.player in (
  select player
  from plays_in
  where game = 50
    and team = 1
)

select
from 
where player in (
  select 
  from
  where
)

select pi.*, p.* 
from plays_in pi inner join player p
  on p.player_id = pi.player
where pi.game = 50
  and pi.team = 1

SELECT *
FROM plays_in pi inner join player p
  on pi.player = p.player_id
WHERE pi.player = 61
  AND pi.game = 89

select
  concat(p.first_name, ' ', p.last_name) as full_name,
  p.pos, p.jersey,
  sum((pi.fg2 * 2) + (pi.fg3 * 3) + (pi.ft * 1)) as pts,
  sum(pi.fg2miss + pi.fg2) as fg2att,
  sum(pi.ft_miss + pi.ft) as ft_att,
  sum(pi.fg3miss + pi.fg3) as fg3att,
  pi.pf, pi.a, pi.reb
from plays_in pi inner join player p
  on pi.player = p.player_id
where pi.player = 74
  and pi.game = 100

SELECT pi.*, p.*
FROM plays_in pi INNER JOIN player p
  ON p.player_id = pi.player
WHERE pi.game = $game_id
  AND pi.team = $team_id

SELECT
  t.name, t.nickname,
  SUM(pi.reb) AS REB,
  SUM(pi.a) AS AST,
  SUM(pi.pf) AS PF,
  SUM(pi.fg2miss + pi.fg2) AS FGA,
  SUM(pi.fg2) AS FGM,
  SUM(pi.fg3miss + pi.fg3) AS 3PA,
  SUM(pi.fg3) AS 3PM,
  SUM(pi.ft_miss + pi.ft) AS FTA,
  SUM(pi.ft) AS FTM,
  SUM((pi.fg2 * 2) + (pi.fg3 * 3) + (pi.ft)) AS PTS
FROM plays_in pi INNER JOIN team t
  ON pi.team = t.team_id 
WHERE pi.game = 99
  AND pi.team = 1
