<?php

class Other
{
  public static function getLevel($level)
  {
    $level = intval($level);
    switch ($level) {
      case 2:
        return "class='level2'";
        break;
      case 3:
        return "class='level3'";
        break;
    }
    return true;
  }


}


?>
