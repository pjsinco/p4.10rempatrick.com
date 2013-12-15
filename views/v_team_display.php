Home: <?=$home->nickname;?><br>
<?php foreach ($home->players as $player): ?>

  <button id='<?=$home->nickname?>-<<?=$player->jersey?>'><?=$player->last_name?></button><br>
  
<?php endforeach; ?>

<br><br>
Away: <?=$away->nickname;?><br>
<?php foreach ($away->players as $player): ?>

  <button id='<?=$away->nickname?>-<<?=$player->jersey?>'><?=$player->last_name?></button><br>
  
<?php endforeach; ?>


