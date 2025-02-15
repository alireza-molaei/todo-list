<?php
include_once "../bootstrap/init.php";
if(!isAjaxRequest()){
  diePage("Invalid Request");

}
if($_POST['action']=='add_folder'){
  if(!empty($_POST['folderName'])){
    echo addFolder($_POST['folderName'] ?? 0);
  }else{
    echo "لطفا مقدار معتبر وارد نمایید";
  }
}
if($_POST['action']=='addTask'){
  if(!empty($_POST['taskTitle'])){
    echo addTaskInput($_POST['taskTitle'], $_POST['folderId']);
  }else{
    echo "لطفا مقدار معتبر وارد نمایید";
  }
}
if($_POST['action']=='toggleTask'){
  if(!empty($_POST['taskId']) and is_numeric($_POST['taskId'])){
    echo doneSwitch($_POST['taskId']);
  }else{
    echo "لطفا مقدار معتبر وارد نمایید";
  }
}