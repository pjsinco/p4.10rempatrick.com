<select id='name='bench' class='bench'>
  <?php foreach ($players_benched as $bench_player): ?>
      <option value='<?php echo $bench_player['player_id']; ?>'>
        <?php echo $bench_player['last_name']; ?>
      </option>
  <?php endforeach; ?>
</select>
<input type='hidden' name='game-id' value='<?=$game_id?>'>
<button class='substitute' type='submit'>Substitute</button>
