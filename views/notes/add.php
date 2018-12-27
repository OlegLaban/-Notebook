<?php require_once(ROOT . '/include/header.php'); ?>
<div class="container">
  <form action="" method="POST">
    <h2>Время</h2>
    <input id="day" type="number" name="day" value="<?php echo date('d', strtotime('+1 day')); ?>" max="31" min="1">
    <input id="month" type="number" name="month" value="<?php echo date('m'); ?>" max="12" min="1">
    <input id="year" type="number" name="year" value="<?php echo date('Y'); ?>" max="<?php echo date('Y',strtotime('+100 years'));  ?>" min="1">
    <input id='hour' type="number" name="hour" value="<?php if((date("G") + 2) > 23){echo 0;}else{echo date("G") + 2;} ?>" max="23" min="0" >
    <input id='minutes' type="number" name="minutes" value="<?php echo date("i");?>" max="59" min="0" >
    <h2>Тема</h2>
    <input id="theme" type="text" name="theme">
    <h2>Коментарий</h2>
    <textarea name="coment" rows="8" cols="80"></textarea>
    <h2>Приоритет</h2>
    <select name="level">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
    <br>
    <br>
    <input type="submit" id="sub" name="submit" value="Добавить дело">
  </form>
</div>



<?php require_once(ROOT . '/include/footer.php'); ?>
