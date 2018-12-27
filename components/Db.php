<?php
/*
* Класс для создания подключения к файлу.
* @author oleg
*/

class Db
{
  public static function getConnectionFile($fileName, $boolJson = true)
  {
    $paramsPath = ROOT . $fileName;
    if($boolJson){
      return json_decode(file_get_contents($paramsPath), true);
    }else{
        return file_get_contents($paramsPath);
    }

  }
}

?>
