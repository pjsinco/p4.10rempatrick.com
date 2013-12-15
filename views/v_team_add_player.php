<h1><?=$name;?> <?=$nickname;?></h1>
<?php printf('%s %s: %s', $name, $nickname, $team_id); ?>
<!-- form for adding players -->
<form id='add-player' action="/team/p_add_player/<?=$team_id?>" method="post" accept-charset="utf-8">
  <label for='first-name'>First name</label>
  <input type='text' name='first-name'><br>

  <label for='last-name'>Last name</label>
  <input type='text' name='last-name'><br>

  <label for='jersey'>Jersey number</label>
  <input type='text' name='jersey'><br>

  <label for='position'>Position</label>
  <select name="position" id="position">
    <option value="forward">Forward</option>
    <option value="center">Center</option>
    <option value="guard">Guard</option>
  </select><br>

  <input class='submit' type='submit' value='Add player'>
</form>
<br><br>
<button id='done' type="button">Done</button>

<!-- this is where we'll list players -->
<div id="roster">
<?php foreach ($players as $player): ?>
    
<?php endforeach; ?>
</div>

