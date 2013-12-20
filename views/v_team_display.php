<h1><?=$team?></h1>
<ul id='sortable'>
  <?php foreach ($players as $player): ?>
    <li class='ui-widget-content'>
      <?=$player['jersey']?> 
      <?//=$player['first_name']?> 
      <?=$player['last_name']?> 
      <?//=$player['pos']?>
        <div class='gameplays' id="makes">Makes
          <button id="two-pt-missed" type="submit">2fg</button>
          <button id="three-pt-missed" type="submit">3fg</button>
          <button id="ft-pt-missed" type="submit">ft</button><br>
        </div> <!-- end makes -->
        <div class='gameplays' id="misses">Misses
          <button id="two-pt-made" type="submit">2fg</button>
          <button id="three-pt-made" type="submit">3fg</button>
          <button id="ft-pt-made" type="submit">ft</button><br>
        </div> <!-- end misses -->
    </li>    
  <?php endforeach; ?>
</ul>
