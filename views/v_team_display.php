<h1><?=$team?></h1>
<div id="<?=$team?>"><?=$team?></div>
<ul class='players'>
  <?php for ($i = 1; $i <= 5; $i++): ?>
  <li title="player-id-<?=${'player_' . $i}->player['player_id']?>" id="player-<?=$i?>-<?=${'player_' . $i}->player['player_id']?>" class='player-card'>
    <div class="player-name">
      <span class="sub ui-icon ui-icon-circle-triangle-e"></span>
      <span class='jersey'>#<?=${'player_' . $i}->player['jersey']?></span> <?=${'player_' . $i}->player['first_name']?> <?=${'player_' . $i}->player['last_name']?> (<?=${'player_' . $i}->player['pos']?>)
    </div><!--     end player-name -->
<!--     <div class='player-info'> -->
<!--       <div class='player-pts'><?//=${'player_' . $i}->player['points']?></div>  -->
<!--     </div> -->
    <div class='gameplays makes'>Makes
      <button class='fg2' type='submit'>2FG</button>
      <button class='fg3' type='submit'>3FG</button>
      <button class='ft' type='submit'>FT</button><br>
    </div> <!-- end makes -->
    <div class='gameplays misses'>Misses
      <button class='fg2miss' type='submit'>2FG</button>
      <button class='fg3miss' type='submit'>3FG</button>
      <button class='ft_miss' type='submit'>FT</button><br>
    </div> <!-- end misses -->
    <div id='player-<?=${'player_' . $i}->player['player_id']?>' class="player-stats">
      <div class="points"><?=${'player_' . $i}->player['points']?><span> pts</span></div>
    </div> <!-- end player-stats -->
    <div class='bench-players'>
      <?=$bench?>
    </div>
  </li>    
  <?php endfor; ?>
</ul>
