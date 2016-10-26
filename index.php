<?php
require_once('Core/SD.php');

try {
   	SD::init();
} catch (Exception $e) {
    echo  $e->getMessage();
}

?>
