<h1><?=$team?></h1>
<ul>
  <?php foreach ($players as $player): ?>
    <li>
      <?=$player['jersey']?> 
      <?=$player['first_name']?> 
      <?=$player['last_name']?> 
      <?=$player['pos']?>
    </li>    
  <?php endforeach; ?>
</ul>

