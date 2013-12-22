<h1><?=$team?></h1>
<div id="<?=$team?>"><?=$team?></div>
<!-- <ul id='sortable'> -->
<ul id='sortable'>
  <?php foreach ($players as $player): ?>
    <?php if ($player['playing']): ?> 
  <?=$bench ?>
  <li title="player-id: <?=$player['player_id']?>" id='player-<?=$player['player_id']?>' class='ui-widget-content'>
    <div class="player-name">
      <?=$player['last_name']?>
      <?=$player['playing']?>
    </div>
    <div class='player-info'>
      <?=$player['jersey']?> 
      <?//=$player['first_name']?> 
      <?//=$player['pos']?>
    </div>
    <div class='gameplays makes'>Makes
      <button id='two-pt-missed' type='submit'>2fg</button>
      <button id='three-pt-missed' type='submit'>3fg</button>
      <button id='ft-pt-missed' type='submit'>ft</button><br>
    </div> <!-- end makes -->
    <div class='gameplays misses'>Misses
      <button id='two-pt-made' type='submit'>2fg</button>
      <button id='three-pt-made' type='submit'>3fg</button>
      <button id='ft-pt-made' type='submit'>ft</button><br>
    </div> <!-- end misses -->
    <div class="player-stats">
      <div class="points">12</div>
    </div> <!-- end player-stats -->
  </li>    
    <?php endif; ?>
  <?php endforeach; ?>
</ul>
