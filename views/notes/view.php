<?php include_once(ROOT . '/include/header.php'); ?>

<div class="container">
    <h2>Дата / время</h2>
    <h2> <?php echo $_SESSION['date']; ?> / <?php echo $_SESSION['time']; ?></h2>
    <h2>Тема</h2>
    <h3><?php echo $notesArr[0]; ?></h3>
    <h2>Коментарий</h2>
    <p><?php echo $notesArr[2]; ?></p>
    <h2>Приоритет</h2>
    <p><?php echo $notesArr[1]; ?></p>
</div>




<?php include_once(ROOT . '/include/footer.php'); ?>
