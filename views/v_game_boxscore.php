<div class="boxscore">
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
  </table>
</div>
