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


  <li title="player-id-<?=${'player_' . $i}->player['player_id']?>" id="player-<?=$i?>-<?=${'player_' . $i}->player['player_id']?>" class='ui-widget-content'>
    <div class="player-name">
      <?=${'player_' . $i}->player['first_name']?> <?=${'player_' . $i}->player['last_name']?>
    </div>
    <div class='player-info'>
      <?=${'player_' . $i}->player['jersey']?> 
<!--       <div class='player-pts'><?//=${'player_' . $i}->player['points']?></div>  -->
    </div>
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
      <div class="points"><?=${'player_' . $i}->player['points']?></div>
    </div> <!-- end player-stats -->
  </li>    
  <?php endfor; ?>
</ul>
