<?php
function site_url($uri = ''){
    return  BASE_URL . $uri;
}
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
function dd($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();  
}
