<?php
include "bootstrap/init.php";
if(!isLoggedIn()){
  header("location:".site_url('auth.php'));
}

if(isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])){
    $deletedCount=  deleteFolder($_GET['delete_folder']);
      
  echo "$deletedCount folder deleted";
  }
  if(isset($_GET['delete_task']) && is_numeric($_GET['delete_task'])){
    $deletedCount=  deleteTask($_GET['delete_task']);
      
  echo "$deletedCount task deleted";
  }
$folders = getFolders();
$tasks = getTasks();

include "tpl/template.php";

?>