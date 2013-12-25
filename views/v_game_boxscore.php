<div class="prefix_3 grid_6 suffix_3">
  <h1>FINAL BOXSCORE</h1>
  <h3><?=$home_totals['TEAM']?></h3>
  <table id="home-boxscore" border="0">
    <thead>
      <tr>
        <th>Player</th>
        <th>FGM-A</th>
        <th>3PM-A</th>
        <th>FTM-A</th>
        <th>REB</th>
        <th>AST</th>
        <th>PTS</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($home_players_stats as $player_stats) :?>
      <tr>
        <td><?=$player_stats['full_name']?></td>
        <td><?=$player_stats['FGM']?>-<?=$player_stats['FGA']?></td>
        <td><?=$player_stats['3PM']?>-<?=$player_stats['3PA']?></td>
        <td><?=$player_stats['FTM']?>-<?=$player_stats['FGA']?></td>
        <td><?=$player_stats['REB']?></td>
        <td><?=$player_stats['AST']?></td>
        <td><?=$player_stats['PTS']?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <td><strong>TOTALS</td>
        <td><strong><?=$home_totals['FGM']?>-<?=$home_totals['FGA']?></strong></td>
        <td><strong><?=$home_totals['3PM']?>-<?=$home_totals['3PA']?></strong></td>
        <td><strong><?=$home_totals['FTM']?>-<?=$home_totals['FGA']?></strong></td>
        <td><strong><?=$home_totals['REB']?></strong></td>
        <td><strong><?=$home_totals['AST']?></strong></td>
        <td><strong><?=$home_totals['PTS']?></strong></td>
      </tr>
    </tfoot>
  </table>
  <h3><?=$away_totals['TEAM']?></h3>
  <table id="away-boxscore" border="0">
    <thead>
      <tr>
        <th>Player</th>
        <th>FGM-A</th>
        <th>3PM-A</th>
        <th>FTM-A</th>
        <th>REB</th>
        <th>AST</th>
        <th>PTS</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($away_players_stats as $player_stats) :?>
      <tr>
        <td><?=$player_stats['full_name']?></td>
        <td><?=$player_stats['FGM']?>-<?=$player_stats['FGA']?></td>
        <td><?=$player_stats['3PM']?>-<?=$player_stats['3PA']?></td>
        <td><?=$player_stats['FTM']?>-<?=$player_stats['FGA']?></td>
        <td><?=$player_stats['REB']?></td>
        <td><?=$player_stats['AST']?></td>
        <td><?=$player_stats['PTS']?></td>
      </tr>
    <?php endforeach; ?>
      <tr>
        <td><strong>TOTALS</strong></td>
        <td><strong><?=$away_totals['FGM']?>-<?=$away_totals['FGA']?></strong></td>
        <td><strong><?=$away_totals['3PM']?>-<?=$away_totals['3PA']?></strong></td>
        <td><strong><?=$away_totals['FTM']?>-<?=$away_totals['FGA']?></strong></td>
        <td><strong><?=$away_totals['REB']?></strong></td>
        <td><strong><?=$away_totals['AST']?></strong></td>
        <td><strong><?=$away_totals['PTS']?></strong></td>
      </tr>
    </tbody>
  </table>
</div>
