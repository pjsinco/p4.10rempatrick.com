<h1><?=$team?></h1>
<div id="<?=$team?>"><?=$team?></div>
<ul id='sortable'>
  <?php for ($i = 1; $i <= 5; $i++): ?>
  <?//=${'player_' . $i}->player['last_name']?>
  <?//=${'player_' . $i}->player['first_name']?>
  <?//=${'player_' . $i}->player['jersey']?>
  <?=$bench?>

  <?php //echo '<pre>'; var_dump(${'player_' . '1'}['last_name']); echo '</pre>'; // debug
   ?>


  <li 
    title="player-id-<?=${'player_' . $i}->player['player_id']?>" 
    id="player-<?=$i?>-<?=${'player_' . $i}->player['player_id']?>" 
    class='ui-widget-content'
  >
    <div class="player-name">
      <?=${'player_' . $i}->player['first_name']?>
      <?=${'player_' . $i}->player['last_name']?>
    </div>
    <div class='player-info'>
      <?=${'player_' . $i}->player['jersey']?> 
      <strong><?=${'player_' . $i}->player['points']?></strong> 
    </div>
    <div class='gameplays makes'>Makes
      <button id='fg2-missed' type='submit'>2FG</button>
      <button id='fg3-missed' type='submit'>3FG</button>
      <button id='ft-missed' type='submit'>FT</button><br>
    </div> <!-- end makes -->
    <div class='gameplays misses'>Misses
      <button id='fg2' type='submit'>2FG</button>
      <button id='fg3' type='submit'>3FG</button>
      <button id='ft' type='submit'>FT</button><br>
    </div> <!-- end misses -->
    <div id='player-<?=${'player_' . $i}->player['player_id']?>' class="player-stats">
      <div class="points"></div>
    </div> <!-- end player-stats -->
  </li>    
  <?php endfor; ?>
</ul>
