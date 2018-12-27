<?php
  require_once( ROOT . '/include/header.php');
?>

<header>
  <h2>Планы на день : <?php echo $nowDate; ?></h2>
</header>
<a href="/notes/add">Добавить дело</a>
<table>
  <tr>
    <th>Время</th>
    <th>Важность</th>
    <th>Тема</th>
    <th>Описание</th>
    <th colspan="2">
      Установить дату:
      <form action="" method="POST">
        <input id="day" class="dateTable" type="number" name="day" value="<?php if(isset($dateArray)){ echo $dateArray[0]; }else{ echo date('d'); }  ?>" max="31" min="1">
        <input id="month" class="dateTable" type="number" name="month" value="<?php if(isset($dateArray)){ echo $dateArray[1]; }else{ echo date('m'); }?>" max="12" min="1">
        <input id="year" class="dateTable" type="number" name="year" value="<?php if(isset($dateArray)){ echo $dateArray[2]; }else{ echo date('Y'); } ?>" max="<?php echo date('Y',strtotime('+100 years'));  ?>" min="1">
        <input type="submit" class="dateTable" id="sub" name="submit" value="Установить дату">
      </form>
    </th>
  </tr>
<?php
    if($bool):
   ?>

      <?php foreach($notes[$nowDate] as $key => $value):?>
<tr>
        <th class="borderRight borderLeft"><?php echo $key; ?></th>
        <th <?php echo Other::getLevel($value[1]); ?>> <?php echo $value[1]; ?></th>
        <th class="borderRight borderLeft"> <?php echo $value[0]; ?></th>
        <th class="borderRight"> <?php echo $value[2]; ?></th>
        <th>
          <input type="button" name="submit" class="buttons buttonsView" value="Просмотреть"  data-date="<?php echo $nowDate; ?>" data-time="<?php echo $key; ?>">
        </th>
        <th>
          <input type="button" name="submit" class="buttons buttonsEdit" value="Редактировать" data-date="<?php echo $nowDate; ?>" data-time="<?php echo $key; ?>">
        </th>
        <th>
          <input type="button" name="submit" class="buttons buttonsDelete" value="Удалить" data-date="<?php echo $nowDate; ?>" data-time="<?php echo $key; ?>">
        </th>
</tr>

      <?php
        endforeach;
      ?>
<?php else: ?>
  <tr>
    <th colspan="5">
      <h2>Дел на сегодня нет.</h2>
    </th>
  </tr>
<?php endif; ?>
</table>






<?php
  require_once(ROOT . '/include/footer.php');
?>
