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
  player INT,
  game INT,
  team INT,
  reb TINYINT,
  o_reb TINYINT,
  assts TINYINT,
  pf TINYINT,
  blks TINYINT,
  turnvr TINYINT,
  fg2miss TINYINT,
  fg2made TINYINT,
  fg3miss TINYINT,
  fg3made TINYINT,
  ft_miss TINYINT,
  ft_made TINYINT,
  foreign key (player) references player(player_id),
  foreign key (game) references game(game_id),
  primary key (player, game)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

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
