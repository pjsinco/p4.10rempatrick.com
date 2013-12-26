<span><?=$team['name']?></span>
<h1 class='team-name'><?=$team['nickname']?></h1>
<ul class='players'>
  <?php for ($i = 1; $i <= 5; $i++): ?>
  <li title="<?=${'player_' . $i}->player['first_name']?> <?=${'player_' . $i}->player['last_name']?>" id="player-<?=$i?>-<?=${'player_' . $i}->player['player_id']?>" class='player-card'>
    <div class="player-name">
      <span class="get-stats ui-icon ui-icon-calculator"></span>
      <span class="sub ui-icon ui-icon-circle-triangle-e"></span>
      <span class='jersey'>#<?=${'player_' . $i}->player['jersey']?></span> <?//=${'player_' . $i}->player['first_name']?> <?=${'player_' . $i}->player['last_name']?> (<?=${'player_' . $i}->player['pos']?>)
    </div><!--     end player-name -->
<!--     <div class='player-info'> -->
<!--       <div class='player-pts'><?//=${'player_' . $i}->player['points']?></div>  -->
<!--     </div> -->
    <div class='gameplays makes'>
      <button class='play fg2' type='submit' title='2-pt Field Goal'>2FG</button>
      <button class='play fg3' type='submit' title='3-pt Field Goal'>3FG</button>
      <button class='play ft' type='submit' title='Free Throw'>FT</button>
      <button class='play reb' type='submit' title='Rebound'>R</button>
      <button class='play a' type='submit' title='Assist'>A</button><br><br>
    </div> <!-- end makes -->
    <div class='gameplays misses'>
      <button class='play fg2miss' type='submit' title='Missed 2-pt Field Goal'>2FG</button>
      <button class='play fg3miss' type='submit' title='Missed 3-pt Field Goal'>3FG</button>
      <button class='play ft_miss' type='submit' title='Missed Free Throw'>FT</button>
      <button class='play pf' type='submit' title='Personal Foul'>PF</button><br>
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
