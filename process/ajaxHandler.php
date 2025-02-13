<?php
include_once "../bootstrap/init.php";
if(!isAjaxRequest()){
  diePage("Invalid Request");
}
if($_POST['action']=='add_folder'){
  if(!empty($_POST['folderName'])){
    echo addFolder($_POST['folderName']);
  }else{
    echo "لطفا مقدار معتبر وارد نمایید";
  }

}