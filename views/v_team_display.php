<h1><?=$team?></h1>
<ul id='sortable'>
  <?php foreach ($players as $player): ?>
    <?php if ($player['playing']): ?> 
  <select name="bench" id="bench">
    <?php foreach ($bench as $benched): ?>
        <option value="<?php echo $benched['last_name']; ?>">
          <?php echo $benched['last_name']; ?>
        </option>
    <?php endforeach; ?>
  </select>
  <button type="submit">Substitute</button>

  <li class='ui-widget-content'>
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
    </div>
  </li>    
    <?php endif; ?>
  <?php endforeach; ?>
</ul>
