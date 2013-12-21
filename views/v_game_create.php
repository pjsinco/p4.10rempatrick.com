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

  <input class='submit' type='submit' value='Create game'>

</form>
