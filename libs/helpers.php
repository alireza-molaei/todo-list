<?php
function diePage($msg){
    echo $msg;
    die();
};
function isAjaxRequest(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
        return true;
    }
    return false;
}