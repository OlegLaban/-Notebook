<?php

  class NotesController
  {
    public function actionAdd()
    {
      if(isset($_POST['submit'])){
        $notes = [];
        $notes = Db::getConnectionFile('/text.txt');
        $dateNote = $_POST['day'] . "." . $_POST['month'] .  "." . $_POST['year'];
        $timeNote = $_POST['hour'] . ":" . $_POST['minutes'];
        $arrayForPus = [
              $timeNote => [
                $_POST['theme'],
                intval($_POST['level']),
                $_POST['coment']
              ]
          ];
        $ArrtimeNote = [
          $_POST['theme'],
          intval($_POST['level']),
          $_POST['coment']
        ];
        if(isset($notes[$dateNote])){
          $notes[$dateNote][$timeNote] = $ArrtimeNote;
        }else{
          $notes[$dateNote] = $arrayForPus;
        }

        File::sortData($notes);
        File::putData($notes, 'text.txt');
      }
      require_once(ROOT . '/views/notes/add.php');
      return true;

    }

    public function actionViewNote()
    {
      if(isset($_SESSION['date']) && isset($_SESSION['time'])){
        $notes = [];
        $notes = Db::getConnectionFile('/text.txt');
        $notesArr = $notes[$_SESSION['date']][$_SESSION['time']];
        require_once(ROOT . "/views/notes/view.php");
      }
      return true;
    }

    public function actionEditNote()
    {
      $notes = [];
      $notes = Db::getConnectionFile('/text.txt');
      if(isset($_POST['submit'])){
        $dateNote = $_POST['day'] . "." . $_POST['month'] .  "." . $_POST['year'];
        $timeNote = $_POST['hour'] . ":" . $_POST['minutes'];
        if(count($notes[$dateNote]) > 1){
          unset($notes[$dateNote][$timeNote]);
        }else{
          unset($notes[$dateNote]);
        }
        $arrayForPus = [
              $timeNote => [
                $_POST['theme'],
                intval($_POST['level']),
                $_POST['coment']
              ]
          ];
          $ArrtimeNote = [
            $_POST['theme'],
            intval($_POST['level']),
            $_POST['coment']
          ];
        if(isset($notes[$dateNote])){
          $notes[$dateNote][$timeNote] = $ArrtimeNote;
        }else{
          $notes[$dateNote] = $arrayForPus;
        }
        File::sortData($notes);
        File::putData($notes, 'text.txt');
        header("Location: /");
      }
     if(isset($_SESSION['date']) && isset($_SESSION['time'])){
        $notesArr = $notes[$_SESSION['date']][$_SESSION['time']];
        $dataArr = explode('.', $_SESSION['date'] );
        $timeArr = explode(':', $_SESSION['time']);
        require_once(ROOT . '/views/notes/edit.php');
      }

      return true;
    }

    public function actionDeleteNote()
    {
      $notes = [];
      $notes = Db::getConnectionFile('/text.txt');
      if(isset($_SESSION['date'])){
        $nowDate = $_SESSION['date'];
        if(isset($_POST['date']) && isset($_POST['time'])){
          $date = $_POST['date'];
          $time = $_POST['time'];
          if(isset($notes[$date][$time])){
            if(count($notes[$date]) > 1){
              unset($notes[$date][$time]);

            }else{
              unset($notes[$date]);
            }
          }
          File::sortData($notes);
          File::putData($notes, 'text.txt');
          echo Db::getConnectionFile('/text.txt', false)
        }
      }
      return true;
    }


  }

?>
