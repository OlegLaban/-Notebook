<?php
class File
{
  public static function putData($content, $filename)
  {
    $file = ROOT . "/$filename";
    $contentJSON  = json_encode($content);
    file_put_contents($file, '');
    file_put_contents($file, $contentJSON);
    return true;
  }

  public static function sortData($notesA)
  {
    function userSort($a, $b)
    {
      return (strtotime($a) < strtotime($b)) ? -1 : 1;
    }
    uksort($notesA, "userSort");
  }
}

?>
