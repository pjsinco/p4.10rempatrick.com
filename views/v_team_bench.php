<select name="bench" id="bench">
  <?php foreach ($benched as $bench_player): ?>
      <option value="<?php echo $bench_player['last_name']; ?>">
        <?php echo $bench_player['last_name']; ?>
      </option>
  <?php endforeach; ?>
</select>
