<?php
class  SiteController
{
  public function actionIndex()
  {

    $notes = [];
    $notes = Db::getConnectionFile('/text.txt');
    $nowDate = date("d.m.Y");
    if(isset($_POST['submit'])){
      $_SESSION['nowDate']= $_POST['day'] .  "." . $_POST['month'] . "." . $_POST['year'];

    }
    if(isset($_SESSION['nowDate'])){
      $nowDate = $_SESSION['nowDate'];
      $dateArray = [];
      $dateArray = explode('.', $nowDate);
    }
    if(isset($notes[$nowDate])){
      $bool = true;
      function userSortTime($a1, $b1)
      {
        return (strtotime($a1) < strtotime($b1)) ? -1 : 1;
      }

      uksort($notes[$nowDate], 'userSortTime');


   }else{
      $bool = false;
    }
    require_once(ROOT . '/views/site/index.php');
    return true;
  }

  public function actionAddSession()
  {
    if(count($_POST) > 0){
      $_SESSION['date'] = $_POST['date'];
      $_SESSION['time'] = $_POST['time'];
    }
    return true;
  }

}

?>
