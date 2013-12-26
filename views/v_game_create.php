<div class="grid_3">&nbsp;</div>
<div class="welcome grid_6">
  
  <h1>Welcome to <?=$app_name?></h1>
  
  <form action="/game/p_create" method="post" accept-charset="utf-8">
    <label for='home'>Home team </label>
    <select name="home" id="home">
      <?php foreach($teams as $team): ?>
        <?php $name = $team['name'] . ' ' . $team['nickname']; ?>
       <option value="<?php echo $team['team_id']; ?>">
         <?php echo $name; ?>
        </option>
      <?php endforeach; ?>
    </select>
    <br>
    <label for='away'>Away team </label>
    <select name="away" id="away">
      <?php foreach($teams as $team): ?>
        <?php $name = $team['name'] . ' ' . $team['nickname']; ?>
       <option value="<?php echo $team['team_id']; ?>">
          <?php echo $name; ?>
        </option>
      <?php endforeach; ?>
    </select>
    <br>
  
    <?php if(isset($error)): ?>
    <div class="error">
      Please make sure the teams are different.
    </div>
    <?php endif; ?>
    <input class='submit' type='submit' value='Score a game'>
  
  </form>
</div>
<div class="grid_3">&nbsp;</div>
