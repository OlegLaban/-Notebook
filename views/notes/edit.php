<?php require_once(ROOT . '/include/header.php'); ?>

<div class="container">
  <form action="" method="POST">
    <h2>Время</h2>
    <input id="day" type="number" name="day" value="<?php echo array_shift($dataArr); ?>" max="31" min="1">
    <input id="month" type="number" name="month" value="<?php echo array_shift($dataArr); ?>" max="12" min="1">
    <input id="year" type="number" name="year" value="<?php echo array_shift($dataArr); ?>" max="<?php echo date('Y',strtotime('+100 years'));  ?>" min="1">
    <input id='hour' type="number" name="hour" value="<?php echo array_shift($timeArr); ?>" max="23" min="0" >
    <input id='minutes' type="number" name="minutes" value="<?php echo array_shift($timeArr); ?>" max="59" min="0" >
    <h2>Тема</h2>
    <input id="theme" type="text" name="theme" value="<?php echo $notesArr[0] ?>">
    <h2>Коментарий</h2>
    <textarea name="coment" rows="8" cols="80"><?php echo $notesArr[2]; ?></textarea>
    <h2>Приоритет</h2>
    <select name="level">
      <option <?php if($notesArr[1] == 0){ echo "selected='selected'";} ?> value="0">0</option>
      <option <?php if($notesArr[1] == 1){ echo "selected='selected'";} ?> value="1">1</option>
      <option <?php if($notesArr[1] == 2){ echo "selected='selected'";} ?> value="2">2</option>
      <option <?php if($notesArr[1] == 3){ echo "selected='selected'";} ?> value="3">3</option>
    </select>
    <br>
    <br>
    <input type="submit" id="sub" name="submit" value="Добавить дело">
  </form>
</div>



<?php require_once(ROOT . '/include/footer.php'); ?>
