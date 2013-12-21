<h1><?=$team['name']?> <?=$team['nickname']?></h1>
<div id="tabs">
  <ul>
    <li><a href="#<?=$team['team_id']?>-playing">playing</a></li>
    <li><a href="#<?=$team['team_id']?>-bench">on-bench</a></li>
  </ul>  
  <div id="<?=$team['team_id']?>-playing">
    <ul class='sortable'>
      <?php foreach ($players as $player): ?>
        <li class='ui-widget-content'>
          <div class="player-name">
            <?=$player['last_name']?>
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
            <div class="points"></div>
          </div>
        </li>    
      <?php endforeach; ?>
    </ul>
  </div>
  <div id="<?=$team['team_id']?>-bench">
    <ul class='sortable'>
    </ul>
  </div>
</div> <!-- end tabs -->
