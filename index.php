<?php
include "bootstrap/init.php";
if(isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])){
    $deletedCount=  deleteFolder($_GET['delete_folder']);
      
  echo "$deletedCount folder deleted";
  }
$folders = getFolders();
$tasks = getTasks();

include "tpl/template.php";

?>