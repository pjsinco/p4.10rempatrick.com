<select name='bench' class='bench'>
  <?php foreach ($benched as $bench_player): ?>
      <option value='<?php echo $bench_player['player_id']; ?>'>
        #<?=$bench_player['jersey']?>
        <?=$bench_player['first_name']?> 
        <?=$bench_player['last_name']?>
        (<?=$bench_player['pos']?>)
      </option>
  <?php endforeach; ?>
</select>
<input type='hidden' name='game-id' value='<?=$game_id?>'>
<button class='substitute' type='submit'>Substitute</button>
